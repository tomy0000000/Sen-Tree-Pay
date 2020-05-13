@extends("layouts.page")
@section("title", "請更換瀏覽器")
@section("cssname", "redirect")
@section("content")

@if ($agent == "Android LINE")
<p>本系統不支援LINE瀏覽器<br>請依照下方的操作方式切換至其他瀏覽器</p>
<video id="instruction-vid" class="img-fluid" autoplay playsinline webkit-playsinline muted loop>
    <source src="/img/ios-line-instruction.mp4" type="video/mp4">
</video>
@elseif ($agent == "iOS LINE")
<p>本系統不支援LINE瀏覽器<br>請依照下方的操作方式切換至Safari瀏覽器</p>
<!-- playsinline 自 iOS 10 開始支援 -->
<!-- 舊版本需使用 webkit-playsinline -->
<video id="instruction-vid" class="img-fluid" autoplay playsinline webkit-playsinline muted loop>
    <source src="/img/ios-line-instruction.mp4" type="video/mp4">
</video>
@elseif ($agent == "iOS WebView")
<p>本系統不支援此瀏覽器<br>請試著尋找<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUwIDUwIiBoZWlnaHQ9IjUwcHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MCA1MCIgd2lkdGg9IjUwcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwb2x5bGluZSBmaWxsPSJub25lIiBwb2ludHM9IjE3LDEwIDI1LDIgMzMsMTAgICAiIHN0cm9rZT0iIzAwNzZmNiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS13aWR0aD0iMiIvPjxsaW5lIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzAwNzZmNiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS13aWR0aD0iMiIgeDE9IjI1IiB4Mj0iMjUiIHkxPSIzMiIgeTI9IjIuMzMzIi8+PHJlY3QgZmlsbD0ibm9uZSIgaGVpZ2h0PSI1MCIgd2lkdGg9IjUwIi8+PHBhdGggZD0iTTE3LDE3SDh2MzJoMzRWMTdoLTkiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzAwNzZmNiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS13aWR0aD0iMiIvPjwvc3ZnPg==">的按鈕<br>並選擇在Safari中開啟</p>
@else
@include("layouts.cross")
<p>我不知道你怎麼把自己搞到這裡的，好自為之吧QQ</p>
<p>{{$agent}}</p>
@endif

@endsection
@section("hideBtnBack", "")