@extends('layouts.admin')
@section('content')
    <h3>Slider To Page</h3>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.slidertopagesave') }}">
        @csrf
        <div class="form-group">
            <label for="name">Sliders</label>
            <select name="slider_id" class="form-control">
             @foreach ($sliders as $item)
                 <option value="{{$item->id}}">{{$item->title}}</option>
             @endforeach
            </select>
            <input type="hidden" name="page_id" value="{{$page_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
