<?php 

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;



class PostController extends Controller
{

     public function getPosts() 
     {
    	$posts = Article::all();
    	$response = [
    		'posts' => $posts
    	];
    	return response()->json($response);
    }

       public function getPost($id) 
     {
    	$posts = Article::find($id);
    	$response = [
    		'posts' => $posts
    	];
    	return response()->json($response);
    }


}