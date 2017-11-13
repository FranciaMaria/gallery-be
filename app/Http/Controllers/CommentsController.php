<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Comment;

class CommentsController extends Controller
{
    public function show($id) {
    	return Comment::where('gallery_id', $id)->with('user')->get();
    }

    public function store(Request $request) {

    	$comment = new Comment();

    	if (!$request->has(['text', 'gallery_id', 'author_id'])) {
    		abort(400);
    	}

        if ( strlen($request['text']) > 1000) {
            return response()->json(['message' => 'Comment text contains more than 1000 characters.', 'error' => 'invalid_data'], 403);
        }

    	$comment->text = $request->input('text');
    	$comment->gallery_id = $request->input('gallery_id');
    	$comment->author_id = $request->input('author_id');

    	$comment->save();

    	return $comment;
    }

    public function destroy($id) {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return new JsonResponse(true);
    }
}
