@extends('layouts.base')
@section('content')
    <h1 class="text-center text-secondary">Articles</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ $article->title }}</h5>
            <p class="card-text"> {{  $article->created_at->diffForHumans() }}, Category: <b>{{ $article->category->name }}</b></p>
            <p class="card-text"> {{  $article->body }}</p>
            <a href="{{ route('article#edit',$article->id) }}" class="btn btn-warning">Update</a>
            <a href="{{ route('article#delete',$article->id) }}" class="btn btn-danger">Delete</a>
        </div>
    </div>
    @if (Session::has('error'))  
<div class="alert alert-danger mt-1 alert-dismissible fade show" role="alert">
  <strong>{{ Session::get('error') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <ul class="list-group mt-1">
  <li class="list-group-item active" aria-current="true"><b>Comment ({{ count($article->comments) }})</b></li>
  @foreach ($article->comments as $comment)
      <li class="list-group-item d-flex justify-content-between">
          <p>
          {{ $comment->content }}<br>
          <small>By <b>{{ $comment->user->name }}</b>, {{ $comment->created_at->diffForHumans() }}</small>
        </p>
        <a href="{{ route('comment#destory',$comment->id) }}" class="close text-decoration-none">&times;</a>
    </li>

  @endforeach
</ul>

<form action="{{route('comment#store')}}" method="post">
    @csrf
    <input type="hidden" name="article_id" id="article_id" value="{{$article->id }}">
    <textarea name="content" id="content" cols="30" rows="2" placeholder="Comment ..." class="mt-1 form-control"></textarea>
    <div class="d-flex"><button type="submit" class="btn btn-primary ms-auto mt-1">Add Coment</button></div>
</form>
        </div>
    </div>
    
@endsection