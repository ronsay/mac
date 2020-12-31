@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.slick', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.slick', "css") }}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.slick-theme', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.slick-theme', "css") }}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/gallery{{ $staticType }}.css">
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ url('/') }}/js/gallery{{ $staticType }}.js"></script>
@stop

@section('content')
    @include('gallery')
@stop

@section('schemaorg')
            @if(isset($gallery))
                ,{
                    "@context": "https://schema.org",
                    "@type": "ImageGallery",
                    "name": "{{ $title }}",
                    "image": [
                    @foreach($gallery['list'] as $ind => $item)
                        {
                            "@type": "ImageObject",
                            "url": "{{ url('/img/gallery/'.$gallery['url'].'/'.$item['image']) }}",
                            "contentUrl": "{{ url('/img/gallery/'.$gallery['url'].'/fit/'.$item['image']) }}",
                            "thumbnail": "{{ url('/img/gallery/'.$gallery['url'].'/thumbnail/'.$item['image']) }}"
                        @if(isset($item['title']) || isset($item['localization']))
                            ,"caption": "{{ (isset($item['title']) ? $item['title'] : '').(isset($item['title']) && isset($item['localization']) ? ' - ' : '').(isset($item['localization']) ? isset($item['localization']) : '') }}"
                        @endif
                        }
                        @if(!$loop->last)
                        ,
                        @endif
                    @endforeach
                    ]
                }
            @endif
@stop
