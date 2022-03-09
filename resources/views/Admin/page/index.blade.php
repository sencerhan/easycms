@extends('layouts.admin')
@section('content')
    <h3>Pages<a href="{{ route('admin.pages.add') }}" class="btn btn-success" style="float: right;"><i
                class="fa fa-plus"></i>Add</a></h3>
    @if ($pages)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td> <a href="{{ route('admin.posttopage', $item->id) }}" class="btn btn-sm btn-primary">Add Post</a>
                            <a href="{{ route('admin.gallerytopage', $item->id) }}" class="btn btn-sm btn-primary">Add
                                Gallery</a>
                            <a href="{{ route('admin.slidertopage', $item->id) }}" class="btn btn-sm btn-primary">Add
                                Slider</a>
                        </td>
                        <td style="width: 100px;">
                            <a href="{{ route('admin.pages.edit', $item->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.pages.delete', $item->id) }}" class="btn btn-sm btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
     
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
