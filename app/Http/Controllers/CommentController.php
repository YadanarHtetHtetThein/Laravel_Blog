<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        $data = $this->getComment($request);
        Comment::insert($data);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function __construct(){
        $this->middleware('auth');
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if(Gate::allows('comment-delete', $comment)){
            $comment->delete();
            return back();
        }
        return back()->with(['error'=>'Unauthorize deletion']);
    }

    private function getComment($request){
        return [
            'content'=> $request->content,
            'article_id'=>$request->article_id,
            'user_id'=>auth()->user()->id,
            'created_at'=>Carbon::now()
        ];
    }
}
