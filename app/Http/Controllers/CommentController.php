<?php 

namespace App\Http\Controllers;


use App\Comment;
use App\Product;
use Illuminate\Http\Request;



class CommentController extends Controller{

public function addComment(Request $request)
    {

    	$comment = new Comment();


    	$comment->product_id = $request->input('product_id');
        $comment->recenzija = $request->input('recenzija');
        $comment->comment_text = $request->input('comment_text');
        $comment->name = $request->input('name');
        
    	$comment->save();


    	return response()->json([

    		'Comment' => $comment
    		], 201);
    }

}