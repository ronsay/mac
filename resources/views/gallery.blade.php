@if(isset($gallery))
<div id="{{ $gallery['id'] ?? 'default' }}" class="container-fluid carousel-gallery @if(isset($gallery['background']) && $gallery['background'] == 'dark') bg-dark @endif" nb-thumb="{{ $gallery['nbthumb'] ?? 4 }}" zoom="{{ $gallery['zoom'] ?? 'false' }}">
    <div class="main-gallery-container gallery-container">
        <div class="row">
            <div class="col-12">
                <div id="{{ $gallery['id'] ?? 'default' }}-gallery-carousel" class="carousel slide gallery-carousel" data-ride="carousel" data-interval="false" data-wrap="false">
                    <div class="carousel-inner">
                        @foreach($gallery['list'] as $ind => $item)
                        <div class="carousel-item @if($ind == 0) active @endif">
                            <img class="d-block w-100" src="{{url('/')}}/img/gallery/fit/{{ $item['image'] }}" alt="{{ $item['title'] ?? $gallery['title'] }}" @if(isset($gallery['modal']) && $gallery['modal']) data-toggle="modal" data-target="#{{ $gallery['id'] ?? 'default' }}-modal-gallery" @endif>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#{{ $gallery['id'] ?? 'default' }}-gallery-carousel" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon w-25 h-25" aria-hidden="true"></span>
                      <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#{{ $gallery['id'] ?? 'default' }}-gallery-carousel" role="button" data-slide="next">
                      <span class="carousel-control-next-icon w-25 h-25" aria-hidden="true"></span>
                      <span class="sr-only">Suivant</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="carousel-indicators slider @if(!isset($gallery['background']) || $gallery['background'] == 'light') bckg-light @endif">
                    @foreach($gallery['list'] as $ind => $item)
                    <div data-slide-to="{{ $ind }}" data-target="#{{ $gallery['id'] ?? 'default' }}-gallery-carousel" class="carousel-indicator-item @if($ind == 0) active @endif">
                        <img src="{{url('/')}}/img/gallery/thumbnail/{{ $item['image'] }}" alt="{{ $item['title'] ?? $gallery['title'] }}" class="w-100">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @if(isset($gallery['modal']) && $gallery['modal'])
    <div class="modal fade pr-2 text-light modal-gallery" id="{{ $gallery['id'] ?? 'default' }}-modal-gallery" tabindex="-1" role="dialog">
        <div class="modal-dialog m-1" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title w-100 text-center">{{ $gallery['title'] ?? '' }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
                </div>
                <div class="modal-body modal-gallery-container gallery-container p-1">
                    <div class="row">
                        <div class="col-12 offset-sm-1 col-sm-10 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                            <div id="{{ $gallery['id'] ?? 'default' }}-modal-gallery-carousel" class="carousel slide modal-gallery-carousel" data-ride="carousel" data-interval="false" data-wrap="false">
                                <div class="carousel-inner">
                                @foreach($gallery['list'] as $ind => $item)
                                  <div class="carousel-item @if($ind == 0) active @endif">
                                    <img class="d-block w-100" src="{{url('/')}}/img/gallery/{{ $item['image'] }}" alt="{{ $item['title'] ?? $gallery['title'] }}">
                                    @if(isset($item['title']) && $item['title'] != '')
                                    <h4 class="text-center">{{ $item['title'] }}</h4>
                                    @endif
                                    @if(isset($item['desc']) && $item['desc'] != '')
                                    <p class="text-center m-0">{{ $item['desc'] }}</p>
                                    @endif
                                  </div>
                                @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#{{ $gallery['id'] ?? 'default' }}-modal-gallery-carousel" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon w-25 h-25" aria-hidden="true"></span>
                                  <span class="sr-only">Précédent</span>
                                </a>
                                <a class="carousel-control-next" href="#{{ $gallery['id'] ?? 'default' }}-modal-gallery-carousel" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon w-25 h-25" aria-hidden="true"></span>
                                  <span class="sr-only">Suivant</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 offset-sm-1 col-sm-10 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                            <div class="carousel-indicators slider">
                                @foreach($gallery['list'] as $ind => $item)
                                <div data-slide-to="{{ $ind }}" data-target="#{{ $gallery['id'] ?? 'default' }}-modal-gallery-carousel" class="carousel-indicator-item @if($ind == 0) active @endif">
                                  <img src="{{url('/')}}/img/gallery/thumbnail/{{ $item['image'] }}" alt="{{ $item['title'] ?? $gallery['title'] }}" class="w-100">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
    @endif
</div>
@endif