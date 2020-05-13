@extends("layouts.page")
@section("title", "兌換掃描")
@section("cssname", "qrscan")
@section("jsname", "qrscan")
@section("content")
<div id="loadingMessage">⌛ Loading video...</div>
<!-- <video class="mx-auto" playsinline webkit-playsinline muted></video> -->
<canvas class="mx-auto" id="canvas" hidden></canvas>
<!-- <input type="file" id="fileinput" /> -->
<script type="text/javascript" src="/js/jsQR.js"></script>
@endsection
