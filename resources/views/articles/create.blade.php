@extends('layouts.base')
@section('content')
    <h1 class="text-center text-secondary my-4">Article Create</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('article#store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                    @if ($errors->has('title'))
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" cols="30" rows="3" class="form-control">{{ old('body')}}</textarea>
                    @if ($errors->has('body'))
                        <small class="text-danger">{{ $errors->first('body') }}</small>
                    @endif
                </div>
                 <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="">Choose option ... </option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id }}" @if (old('category_id')==$category->id)
                            {{'selected'}}
                        @endif>{{$category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Create article</button>
            </form>
        </div>
    </div>
@endsection