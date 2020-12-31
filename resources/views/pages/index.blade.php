@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/index{{ $staticType }}.css">
@stop

@section('script')
    <script src="{{ url('/') }}/js/index{{ $staticType }}.js"></script>
@stop

@section('content')
    @if(isset($carousel))  
    <section>
        <div id="home-carousel" class="carousel slide carousel-fade position-absolute w-100" data-ride="carousel" data-interval="5000"> 
            <div class="carousel-inner">   
            @foreach($carousel as $item)
                <div class="carousel-item @if($loop->first) active @endif"> 
                    <img class="d-block position-absolute" @if($loop->first) src= @else src="" data-src= @endif"{{ url('/'.$item['image']) }}" alt="{{ $item['title'] }}"> 
                    <div class="carousel-caption text-uppercase">
                    @if(isset($item['page']))
                        <h2>
                            <a href="{{url('/'.$item['page'])}}" class="text-white">
                                {{ $item['title'] }}
                            </a>
                        </h2>
                    @else
                        <h2>{{ $item['title'] }}</h2>
                    @endif
                    </div>
                </div>
            @endforeach
            </div>             
        </div>
    </section>
    @endif

    <section class="text-center" id="realisations">
        <h2 class="py-3">Voir nos réalisations</h2>
@if(isset($galleries))    
    @foreach($galleries as $ind => $gallery)
        @if($ind%4 == 0)
        <div class="col-12 offset-xl-1 col-xl-10">
            <div class="card-deck">
        @endif
                <article class="card mb-3">
                    <div>
                        <a href="{{url('/realisations/'.$gallery['url'])}}">                                        
                            <img class="img-fluid " alt="{{$gallery['title']}}" src="{{url('/img/gallery/'.$gallery['url'].'/fit/'.$gallery['image'])}}">
                        </a>                                
                    </div>
                    <div class="card-body">
                        <h3>
                            <a href="{{url('/realisations/'.$gallery['url'])}}">{{$gallery['title']}}</a>
                        </h3>
                    </div>
                </article>
            @if($ind%2 == 1)
                <div class="w-100 d-none d-sm-block d-lg-none"></div>
            @endif
        @if($loop->last || $ind%4 == 3)
            </div>
        </div>
        @endif
    @endforeach
@endif
    </section>
@stop

@section('schemaorg')
                ,{
                    "@context": "https://schema.org",
                    "@type": "ImageGallery",
                    "name": "Carousel page d'accueil",
                    "image": [
                    @foreach($meta->getOg()['images'] as $image)
                        {
                            "@type": "ImageObject",
                            "url": "{{ $image['url'] }}"
                        }
                        @if(!$loop->last)
                        ,
                        @endif
                    @endforeach
                    ]
                }
            @if(isset($galleries))
                ,{
                    "@context": "https://schema.org",
                    "@type": "ImageGallery",
                    "name": "Réalisations",
                    "image": [
                    @foreach($galleries as $ind => $gallery)
                        {
                            "@type": "ImageObject",
                            "url": "{{ url('/img/gallery/'.$gallery['url'].'/'.$gallery['image']) }}",
                            "contentUrl": "{{ url('/img/gallery/'.$gallery['url'].'/fit/'.$gallery['image']) }}",
                            "thumbnail": "{{ url('/img/gallery/'.$gallery['url'].'/thumbnail/'.$gallery['image']) }}"
                        @if(isset($gallery['title']))
                            ,"caption": "{{ $gallery['title'] }}"
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