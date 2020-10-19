@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/gallery.css">
@stop

@section('script')
    <script src="{{ url('/') }}/js/gallery.js"></script>
@stop

@section('content')
    @include('gallery')
@stop