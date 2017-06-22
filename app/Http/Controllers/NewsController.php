<?php 

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;



class NewsController extends Controller
{

	

     public function getArticles() 
     {
    	$articles = Article::with('kategorijaId')->get();;
    	$response = [
    		'novosti' => $articles
    	];
    	return response()->json($response);
    }

    public function getArticle($id) 
     {
    	$article = Article::with('kategorijaId')->find($id);
    	$response = [
    		'article' => $article
    	];
    	return response()->json($response);
    }


}