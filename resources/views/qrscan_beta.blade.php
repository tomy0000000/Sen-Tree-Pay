@extends("layouts.page")
@section("title", "兌換掃描")
@section("cssname", "qrscan_beta")
@section("jsname", "qrscan_beta")
@section("content")
<video id="video" class="mx-auto" playsinline webkit-playsinline muted></video>
<div id="loadingMessage">⌛ Loading video...</div>
<canvas id="canvas" class="mx-auto"></canvas>
<!-- <input type="file" id="fileinput" /> -->
<br>
<button type="button" id="swap_btn" class="btn btn-success btn-lg m-3">
    <i class="fas fa-sync"></i>&ensp;切換鏡頭
</button>
<script type="text/javascript" src="/js/jsQR.js"></script>
@endsection
