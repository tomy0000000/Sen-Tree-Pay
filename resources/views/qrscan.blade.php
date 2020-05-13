@extends("layouts.page")
@section("title", "兌換掃描")

@section("css")
<link rel="stylesheet" type="text/css" href="/css/qrscan.css">
<script>
    var _DONE = false;
</script>
@endsection

@section("js")
<script type="text/javascript" src="/js/qrscan.js"></script>
@endsection

@section("content")
<video id="video" class="mx-auto" playsinline webkit-playsinline muted></video>
<div id="loadingMessage">⌛ Loading video...</div>
<canvas id="canvas" class="mx-auto"></canvas>
<br>
<button type="button" id="swap_btn" class="btn btn-success btn-lg m-3">
    <i class="fas fa-sync"></i>&ensp;切換鏡頭
</button>
@endsection