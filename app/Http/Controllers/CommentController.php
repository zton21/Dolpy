<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\TopicSection;
use App\Events\NewCommentEvent;

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

        $comment_data = json_encode($comment->only(['chatContent', 'chatDate']));
        $comment_data = $comment->only(['chatContent', 'chatDate']);

        $user = Auth::user();
        # broadcast updatenya
        broadcast(new NewCommentEvent([
            'comment' => $comment_data,
            'project_id' => $project_id,
            'sender' => $user->only(['firstName', 'id']),
        ]));
    }

    // Sementara:     
    public static function check_for_update(Request $request) {
        $data = TopicSection::find($request->topic_id);
        return $data->last_comment_id;
    }

    public static function update_message_handler(Request $request) {
        # validate - not implemented
        $user_id = Auth::user()->id;
        $data = DB::select('select c.*, u.firstName from comments c JOIN users u ON c.user_id = u.id where c.id > ? and c.topic_id = ?;', [$request->last_comment_id, $request->topic_id]);
        // dd($data);
        foreach ($data as $key => $value) {
            $data[$key]->own = ($data[$key]->user_id == $user_id);
        }
        return $data;
    }
}
