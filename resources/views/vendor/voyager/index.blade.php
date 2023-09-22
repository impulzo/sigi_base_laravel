@extends('voyager::master')

@section('content')
    <div id="r-dashboard" data-url="{{url('/')}}"></div>
@stop
@section('javascript')
    <script src="{{ mix('js/pages/Dashboard.js') }}"></script>
@stop