@extends('layouts.admin')
@section('content')
    <h3>Pages</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.pages') }}">Pages</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.pages.update', $page->id) }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="title" type="text" name="title[{{ $item->id }}]" class="form-control"
                                value="{{ $page[$item->id]->title }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="slug">Seo Url</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="slug" type="text" name="slug[{{ $item->id }}]" class="form-control"
                                value="{{ $page[$item->id]->slug }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="meta_title" type="text" name="meta_title[{{ $item->id }}]" class="form-control"
                                value="{{ $page[$item->id]->meta_title }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="meta_description" type="text" name="meta_description[{{ $item->id }}]"
                                class="form-control" value="{{ $page[$item->id]->meta_description }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="meta_keywords" type="text" name="meta_keywords[{{ $item->id }}]"
                                class="form-control" value="{{ $page[$item->id]->meta_keywords }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="sort_order">Parent Page </label>
            @if ($pages)
                <select name="parent_id" class="form-control">
                    <option value="0">Select a page</option>
                    @foreach ($pages as $item)
                        <option value="{{ $item->page_id }}" @if ($item->page_id == $page->parent_id) selected

                    @endif> {{ $item->title }}</option>
            @endforeach
            </select>
            @endif
        </div>
        <div class="form-group">
            <label for="sort_order">Sort Order </label>
            <input id="sort_order" type="text" name="sort_order" class="form-control" value="{{ $page->sort_order }}">
        </div>
        <div class="form-group">
            <label for="main_menu">Show Main Menu: </label>
            <input id="main_menu" type="radio" name="main_menu" value="1" @if ($page->main_menu) checked

            @endif>Yes
            <input id="main_menu" type="radio" name="main_menu" value="0" @if (!$page->main_menu) checked

            @endif>No
        </div>
        <div class="form-group">
            <label for="footer_menu">Show Footer Menu: </label>
            <input id="footer_menu" type="radio" name="footer_menu" value="1" @if ($page->footer_menu) checked

            @endif>Yes
            <input id="footer_menu" type="radio" name="footer_menu" value="0" @if (!$page->footer_menu) checked

            @endif>No
        </div>
        <div class="form-group">
            <label for="main_menu">Set As Homepage: </label>
            <input id="main_menu" type="radio" name="home_page" value="1" @if ($page->home_page) checked

            @endif>Yes
            <input id="main_menu" type="radio" name="home_page" value="0" @if (!$page->home_page) checked

            @endif>No
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
