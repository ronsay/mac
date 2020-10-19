@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/index.css">
@stop

@section('script')
    <script src="{{ url('/') }}/js/index.js"></script>
@stop

@section('content')
    <section>
        <div id="home-carousel" class="carousel slide position-absolute carousel-fade w-100" data-ride="carousel" data-interval="7500"> 
            <div class="carousel-inner"> 
                <div class="carousel-item active"> 
                    <img class="d-block position-absolute" src="https://dummyimage.com/1920x1080/000/fff&text=1" alt="Index"> 
                </div> 
                <div class="carousel-item"> 
                    <img class="d-block position-absolute" src="https://dummyimage.com/1920x1080/fff/000&text=2" alt="Index"> 
                </div>
                <div class="carousel-item"> 
                    <img class="d-block position-absolute" src="https://dummyimage.com/1920x1080/222/bbb&text=3" alt="Index"> 
                </div>
                <div class="carousel-item"> 
                    <img class="d-block position-absolute" src="https://dummyimage.com/1920x1080/888/666&text=4" alt="Index"> 
                </div>
            </div>             
        </div>
    </section>
@stop