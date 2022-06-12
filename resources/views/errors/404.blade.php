@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', 'このページはご利用いただけません')

@section('image')
    <div
        style="background-image: url({{ asset('/images/not_found.png') }});"
        class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"
    ></div>
@endsection

@section('detail')
    アクセスしようとしたページが見つかりませんでした。
    ページが移動または削除されたか、URLの入力間違いの可能性があります。
@endsection
