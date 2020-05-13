@extends("layouts.page")
@section("title", "兌換成功")
@section("hideBtnBack", "")

@section("css")
<link rel="stylesheet" type="text/css" href="/css/check-cross-anime.css">
@endsection

@section("content")
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> </svg>
<p class="success">恭喜成功儲值${{ $qr->points }}</p>
<p>目前餘額：{{ $team->points }}</p>
<a href="dashboard">
    <button type="button" class="btn btn-dark btn-lg">
    <i class="fas fa-arrow-left"></i>&ensp;返回
</button>
</a>
@endsection
