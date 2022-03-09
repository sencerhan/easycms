@extends('layouts.admin')
@section('content')
    <h3>Sliders<a href="{{route('admin.sliders.add')}}" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i>Add</a></h3>
    @if ($sliders)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td><a href=""></td>
                        <td style="width: 100px;">
                            <a href="{{route('admin.sliders.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{route('admin.sliders.delete', $item->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
