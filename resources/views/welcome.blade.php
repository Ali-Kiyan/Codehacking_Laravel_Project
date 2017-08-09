@extends('layouts.landing')
@section('content')

@endsection
<div class="page-bg"></div>
<style>


.page-bg {
    background: url('/images/landing_pic.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    -webkit-filter: blur(2px);
    -moz-filter: blur(3px);
    -o-filter: blur(3px);
    -ms-filter: blur(3px);
    filter: blur(3px);
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: -1;
}
</style>