<?php

namespace App\Http\Controllers;

use App\Articles;
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
        $article = Articles::FindOrFail($id);
        return view('articles/single', compact('article'));
    }
    public function add(Request $request)
    {
        $articles = new Categories;
        $articles->name = $request->name;
        $articles->save();
    }
    public function delete($id)
    {
        $article = Categories::FindOrFail($id);
        $article->delete();
    }
    public function attachArticle($id, $cat_id)
    {
        $article = Categories::FindOrFail($id);
        $article->categories()->attach($cat_id);
        $article->update();
    }
    public function detachArticle($id, $cat_id)
    {
        $article = Categories::FindOrFail($id);
        $article->categories()->detach($cat_id);
        $article->update();
    }
}
