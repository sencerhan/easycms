@extends('layouts.site')
@section('content')
    @if ($page)
        @if ($page->modules)
            @foreach ($page->modules as $module)
                @if ($module->post)
                    {!! $module->post->content !!}
                @endif 
                @if ($module->slider)
                    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

                    <script>
                        $(document).ready(function() {
                            $('.bxslider').bxSlider({
                                "auto": true
                            });
                        });
                    </script>
                    @if ($module->slider->images)
                        <div class="bxslider">
                            @foreach ($module->slider->images as $image)
                                <div><img src="{{ $image->src }}" title="Funky roots"></div>
                            @endforeach
                        </div>
                    @endif
                @endif
                @if ($module->gallery)
                    @if ($module->gallery->images)
                    @endif
                    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1"> 
                    <link href="nanogallery/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
                    <script type="text/javascript" src="nanogallery/dist/jquery.nanogallery2.min.js"></script> 

                    <div class="container"> 
                    <div ID="ngy2p" data-nanogallery2='{
                                  "thumbnailWidth": "200",
                                  "thumbnailLabel": {
                                    "position": "overImageOnBottom"
                                  },
                                  "thumbnailAlignment": "center",
                                  "thumbnailOpenImage": true,
                                }'>
                        @foreach ($module->gallery->images as $image) 
                            <a href="{{ $image->src }}" data-ngthumb="{{ $image->src }}" data-ngdesc=""></a>
                        @endforeach  
                    </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endif
@endsection
