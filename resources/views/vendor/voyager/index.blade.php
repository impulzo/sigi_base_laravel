

@extends('voyager::master')

@section('content')
    <div id="app">
        <dashboard></dashboard>
    </div>
@stop
@section('javascript')
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
      BASE_URL = '{{ url('/') }}'  
    </script>
@stop