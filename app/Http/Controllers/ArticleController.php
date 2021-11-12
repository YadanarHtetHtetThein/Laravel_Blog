<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        $data = Article::latest()->paginate(5);
        return view('articles.index')->with(['articles'=>$data]);
    }

    public function create()
    {
        $data = Category::all();
        return view('articles.create')->with(['categories'=>$data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        Article::insert($this->getArticleData($request));
        return redirect()->route('article#index')->with(['articleCreated'=>'Article is created!']);
    }
  
    public function show($id)
    {
        $data = Article::where('id',$id)->first();
        return view('articles.detail')->with(['article'=>$data]);
    }

    public function edit($id)
    {
        
        $categories = Category::all();
        $data = Article::where('id',$id)->first();
        return view('articles.edit')->with(['article'=>$data, 'categories'=>$categories]);
    }
    public function update($id, Request $request)
    {
         $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        Article::where('id',$id)->update($this->getArticleData($request));
        return redirect()->route('article#index')->with(['articleUpdated'=>'Article is updated!']);
    }

    public function destroy($id)
    {
        Article::where('id',$id)->delete();
        return redirect()->route('article#index')->with(['articleDeleted'=>'Article is deleted!']);
    }

    private function getArticleData($request){
        return [
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'created_at'=>Carbon::now(),
        ];
    }

}
