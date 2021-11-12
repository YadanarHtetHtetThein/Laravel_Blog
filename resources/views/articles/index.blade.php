@extends('layouts.base')
@section('content')
    <h1 class="text-center text-secondary">Articles</h1>
    @auth
         <div class="d-flex">
        <a href="{{ route('article#create') }}" class="ms-auto"><button class="btn btn-info">Create article</button></a>
    </div>
    @endauth
   
    <div class="">
        <div class="text-center">{{ $articles->links() }}</div>
    </div>
    @foreach ($articles as $article)
    <div class="card m-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{  $article->body }}</p>
            {{-- <p>{{ $article->category_id }}</p> --}}
            <div class="d-flex">
            <a href="{{ route('article#detail',$article->id) }}" class="btn btn-primary ms-auto">See More ...</a>
            </div>
        </div>
    </div>
    @endforeach
@endsection