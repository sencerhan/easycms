@extends('layouts.admin')
@section('content')
    <h3>Languages<a href="{{route('admin.languages.add')}}" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i>Add</a></h3>
    @if ($languages)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td></td>
                        <td style="width: 100px;">
                            <a href="{{route('admin.languages.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{route('admin.languages.delete', $item->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    @endif
@endsection
