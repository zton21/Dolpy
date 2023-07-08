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

        # update last comment
        $topic = TopicSection::find($request->topic_id);
        $topic->last_comment_id = $comment->id;
        $topic->save();

        $comment_data = $comment->only(['chatContent', 'chatDate', 'topic_id']);
        
        $user = Auth::user();
        # broadcast updatenya
        // $comment = new NewCommentEvent();
        
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                // 'encryption_master_key_base64' => 'JG5Nd21WbEt7L19wVkIkKixuSG50XktW'
            ],
        );

        $pusher->trigger(
            'private-project.'.$project_id,
            'send-message',
            [
                'comment' => $comment_data,
                'project_id' => $project_id,
                'sender' => $user->only(['firstName', 'id']),
            ]
        );

        // dd($comment);
        # Semua yang udah connect diupdate
        
    }

}
