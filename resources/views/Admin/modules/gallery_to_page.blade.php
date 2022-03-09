@extends('layouts.admin')
@section('content')
    <h3>Gallery To Page</h3>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.gallerytopagesave') }}">
        @csrf
        <div class="form-group">
            <label for="name">Galleries</label>
            <select name="gallery_id" class="form-control">
             @foreach ($galleries as $item)
                 <option value="{{$item->id}}">{{$item->title}}</option>
             @endforeach
            </select>
            <input type="hidden" name="page_id" value="{{$page_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
