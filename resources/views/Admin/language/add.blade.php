@extends('layouts.admin')
@section('content')
    <h3>Languages</h3>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.languages.insert') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input id="code" type="text" name="code" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="code">Set as Default</label>
            <input type="radio" name="default" value="1">Yes
            <input type="radio" name="default" value="0">No
        </div>
        <div class="form-group">
            <label for="flag">Flag</label>
            <input id="code" type="text" name="flag" class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
