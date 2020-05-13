@extends("layouts.page")
@section("title", "儀表板")

@section("css")
<link rel="stylesheet" type="text/css" href="/css/dashboard.css">
@endsection

@section("js")
<script type="text/javascript" src="/js/dashboard.js"></script>
@endsection

@section("content")
<button type="button" class="btn btn-primary btn-block btn-lg my-3" onclick="window.location='myTeam'">關於我</button>
@if($user->role <= 10)
<button type="button" class="btn btn-success btn-block btn-lg my-3" onclick="window.location='qr/scan'">儲值QR</button>
@endif @if($user->role >= 30)
<button type="button" class="btn btn-success btn-block btn-lg my-3" onclick="window.location='qr/create'">產生QR</button>
<button type="button" class="btn btn-danger btn-block btn-lg my-3" onclick="window.location='qr/list'">已產生QR</button>
@endif @if($user->role >= 10)
@endif @if($user->role >= 99)
<button type="button" class="btn btn-warning btn-block btn-lg my-3" onclick="window.location='allTeam'">查看排行榜</button>
<button type="button" class="btn btn-info btn-block btn-lg my-3" onclick="window.location='admin'">管理員界面</button>
@endif
<button type="button" class="btn btn-dark btn-block btn-lg my-3" onclick="window.location='logout'">登出</button>
@endsection
@section("hideBtnBack", "")