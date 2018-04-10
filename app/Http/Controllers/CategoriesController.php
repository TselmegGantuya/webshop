<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('categories/index', compact('categories'));
    }
    public function get($id)
    {
        $categorie = Categories::FindOrFail($id);
        $articles = $categorie->articles;
        return view('categories/single', compact('categorie','articles'));
    }
    public function add(Request $request)
    {
        $categorie = new Categories;
        $categorie->name = $request->name;
        $categorie->save();
    }
    public function delete($id)
    {
        $categorie = Categories::FindOrFail($id);
        $categorie->delete();
    }
    public function attachArticle($id, $art_id)
    {
        $categorie = Categories::FindOrFail($id);
        $categorie->articles()->attach($art_id);
        $categorie->update();
    }
    public function detachArticle($id, $art_id)
    {
        $categorie = Categories::FindOrFail($id);
        $categorie->articles()->detach($art_id);
        $categorie->update();
    }
}
