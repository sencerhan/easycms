@extends('layouts.admin')
@section('content')
    <h3>Sliders</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.sliders') }}">Sliders</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.sliders.update',$slider->id) }}">
        @csrf
        <div class="form-group">
            <label for="title">Slider Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="title" type="text" name="title[{{ $item->id }}]" class="form-control"
                                value="{{ $slider[$item->id]->title }}">
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="description">Slider Description</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="description" type="text" name="description[{{ $item->id }}]"
                                class="form-control" value="{{ $slider[$item->id]->description }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <script>
            function open_popup(url) {
                var w = 880;
                var h = 570;
                var l = Math.floor((screen.width - w) / 1);
                var t = Math.floor((screen.height - h) / 1);
                var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t +
                    ",left=" + l);
            }
            var addImages;
            $(document).ready(function() {
                addImages = function() {

                }
                @foreach (App\Models\Admin\Language::all() as $item)
                    $("#images{{ $item->id }}").change(function() {
                    if ($(this).val().indexOf(",") >= 0){
                    var data=$.parseJSON($(this).val());
                    $.each(data, function(index) {
                    $("#imagelist{{ $item->id }} > table").append(`
                    <tr>
                        <td style="width:100px;">
                            <img src="`+data[index]+`" style="width:100px; height:100px;">
                            <input id="" type="hidden" name="urls[{{ $item->id }}][]" value="`+data[index]+`">
                        </td>
                        <td>
                            <input id="title" type="text" name="titles[{{ $item->id }}][]" class="form-control" value=""
                                placeholder="Title">
                            <input id="title" type="text" name="descriptions[{{ $item->id }}][]" class="form-control" value=""
                                placeholder="Description">
                            <input id="title" type="text" name="links[{{ $item->id }}][]" class="form-control" value=""
                                placeholder="Link">
                        </td>
                        <td style="width:100px;">
                            <a class="btn btn-sm btn-danger" onclick="$(this).parent().parent().remove();"><i
                                    class="fa fa-trash"></i>Remove</a>
                        </td>
                    </tr>
                    `);
                    });
                    }else{
                    $("#imagelist{{ $item->id }} > table").append(`
                    <tr>
                        <td style="width:100px;">
                            <img src="`+$(this).val()+`" style="width:100px; height:100px;">
                            <input id="" type="hidden" name="urls[{{ $item->id }}][]" value="`+$(this).val()+`">
                        </td>
                        <td>
                            <input id="title" type="text" name="titles[{{ $item->id }}][]" class="form-control" value=""
                                placeholder="Title">
                            <input id="title" type="text" name="descriptions[{{ $item->id }}][]" class="form-control" value=""
                                placeholder="Description">
                            <input id="title" type="text" name="links[{{ $item->id }}][]" class="form-control" value=""
                                placeholder="Link">
                        </td>
                        <td style="width:100px;">
                            <a class="btn btn-sm btn-danger" onclick="$(this).parent().parent().remove();"><i
                                    class="fa fa-trash"></i>Remove</a>
                        </td>
                    </tr>
                    `);
                    }
                
                    });
                @endforeach

            });
        </script>

        @foreach (App\Models\Admin\Language::all() as $item)
            <input type="hidden" id="images{{ $item->id }}" value="">
        @endforeach



        @foreach (App\Models\Admin\Language::all() as $item)
            <div class="form-group" id="imagelist{{ $item->id }}">
                <a href="javascript:open_popup('@filemanager_get_resource(dialog.php)?type=1&popup=1&field_id=images{{ $item->id }}&akey=@filemanager_get_key() ')"
                    class="btn btn-default" type="button"><img style="height:20px;" src="{{ $item->flag }}">Add
                    Images</a>
                <table style="width:100%;">
                    @if ($slider[$item->id]->images)
                        @foreach ($slider[$item->id]->images as $image)
                            <tr>
                                <td style="width:100px;">
                                    <img src="{{$image->src}}" style="width:100px; height:100px;">
                                    <input id="" type="hidden" name="urls[{{ $item->id }}][]"
                                        value="{{$image->src}}">
                                </td>
                                <td>
                                    <input id="title" type="text" name="titles[{{ $item->id }}][]"
                                        class="form-control" value="{{$image->title}}" placeholder="Title">
                                    <input id="title" type="text" name="descriptions[{{ $item->id }}][]"
                                        class="form-control" value="{{$image->description}}" placeholder="Description">
                                    <input id="title" type="text" name="links[{{ $item->id }}][]"
                                        class="form-control" value="{{$image->link}}" placeholder="Link">
                                </td>
                                <td style="width:100px;">
                                    <a class="btn btn-sm btn-danger" onclick="$(this).parent().parent().remove();"><i
                                            class="fa fa-trash"></i>Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
