<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\TopicSection;
use App\Events\NewCommentEvent;
use Pusher\Pusher;
use App\Http\Controllers\UserController;

class CommentController extends Controller
{
    // Add message
    public static function add_comment(Request $request, $project_id) {
        $comment = new Comment;
        $comment->chatContent = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->chatDate = date("Y-m-d H-i-s");

        $comment->topic_id = $request->topic_id;
        $comment->save();
        $comment->chatDate = date('d/m/Y - g:i A', strtotime($comment->created_at)); // Ubah format

        # update last comment
        $topic = TopicSection::find($request->topic_id);
        $topic->last_comment_id = $comment->id;
        $topic->n_message += 1;
        // dd($topic, $comment);
        $topic->save();

        $comment_data = $comment->only(['chatContent', 'chatDate', 'topic_id']);
        
        $user = Auth::user();
        
        // Push event
        $pusher = ProjectController::pusher();
        $pusher->trigger(
            'private-project.'.$project_id,
            'send-message',
            [
                'comment' => $comment_data,
                'project_id' => $project_id,
                'sender' => $user->only(['firstName', 'id']),
            ]
        );

        
    }

}
