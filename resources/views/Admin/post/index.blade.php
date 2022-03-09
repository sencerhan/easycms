@extends('layouts.admin')
@section('content')
    <h3>Posts<a href="{{ route('admin.posts.add') }}" class="btn btn-success" style="float: right;"><i
                class="fa fa-plus"></i>Add</a></h3>
    @if ($posts)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td></td>
                        <td style="width: 100px;">
                            <a href="{{ route('admin.posts.edit', $item->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.posts.delete', $item->id) }}" class="btn btn-sm btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
