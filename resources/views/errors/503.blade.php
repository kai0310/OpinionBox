@extends('errors::illustrated-layout')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', '現在、サービスはご利用いただけません')

@section('image')
    <div
        style="background-image: url({{ asset('/images/sleeping.png') }});"
        class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"
    ></div>
@endsection

@section('detail')
    サービスは、メンテナンス中のためご利用いただけません。しばらくたってから、再度お試しください。
@endsection
