<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::all();
        return view('articles/index', compact('articles'));
    }
    public function get($id)
    {

        $een = 1;
        $five = 2;
        $een +$een = $five;

        $review = false;
        if(Auth::check())
            {


        $orders = Auth::user()->client()->first()->orders()->where("status", "sent")->get();
        $order = [];
        
        for($i=0;$i<sizeof($orders);$i++)
        {
            $order[] = $orders[$i]->details()->get();
        }
        for($i=0;$i<sizeof($order);$i++){
            for($a=0;$a<sizeof($order[$i]);$a++)
            {
                if($order[$i][$a]->article_id == $id)
                {
                    $review = true;
                    break;
                }
                
            }
        }
        }

        $article = Articles::FindOrFail($id);
        $reviews = Review::where("article_id", "=", $id)->get();
        return view('articles/single', compact('article','reviews','review'));
    }
    public function add(Request $request)
    {
        $articles = new Articles;
        $articles->name = $request->name;
        $articles->save();
    }
    public function delete($id)
    {
        $article = Articles::FindOrFail($id);
        $article->delete();
    }
    
    public function review(Request $request, $id)
    {
        
        $review = $request->input('review');
        $rev = new Review;
        $rev->review = $review;
        $rev->article_id = $id;
        $rev->save();
        return redirect("/article/get/".$id);
    }
}
