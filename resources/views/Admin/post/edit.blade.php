@extends('layouts.admin')
@section('content')
    <h3>Posts</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts') }}">Posts</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.update',$post->id) }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="title" type="text" name="title[{{ $item->id }}]" class="form-control" value="{{$post[$item->id]->title}}">
                        </td>
                    </tr>
                </table>
            @endforeach
        </div> 

        <script src="js/ckeditor/ckeditor.js" referrerpolicy="origin"></script>

        <script>
            @foreach (App\Models\Admin\Language::all() as $item)
            $("#document").ready(function(){
                CKEDITOR.replace(document.getElementById('content{{ $item->id }}'), {
                filebrowserBrowseUrl : '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl : '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl : '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=1&editor=ckeditor&fldr=',
                language : '<?php App::getLocale() ?>'
            });
            });
            @endforeach
        </script>


        <div class="form-group">
            <label for="meta_keywords">Content</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td>
                            <textarea id="content{{ $item->id }}" name="content[{{ $item->id }}]">{{$post[$item->id]->content}}</textarea>
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
