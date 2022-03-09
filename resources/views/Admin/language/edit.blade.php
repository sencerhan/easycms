@extends('layouts.admin')
@section('content')
    <h3>Languages</h3>
    @if ($language)
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.languages.update', $language->id) }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ $language->name }}">
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input id="code" type="text" name="code" class="form-control" value="{{ $language->code }}">
            </div>
            <div class="form-group">
                <label for="code">Set as Default</label>
                <input type="radio" name="default" value="1" @if ($language->default == 1) checked @endif>Yes
                <input type="radio" name="default" value="0" @if ($language->default != 1) checked @endif>No
            </div>
            <div class="form-group">
                <label for="flag">Flag</label>
                <input id="code" type="text" name="flag" class="form-control" value="{{ $language->flag }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endif
@endsection
