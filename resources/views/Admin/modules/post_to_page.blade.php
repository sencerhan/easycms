@extends('layouts.admin')
@section('content')
    <h3>Post To Page</h3>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posttopagesave') }}">
        @csrf
        <div class="form-group">
            <label for="name">Posts</label>
            <select name="post_id" class="form-control">
             @foreach ($posts as $item)
                 <option value="{{$item->id}}">{{$item->title}}</option>
             @endforeach
            </select>
            <input type="hidden" name="page_id" value="{{$page_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
