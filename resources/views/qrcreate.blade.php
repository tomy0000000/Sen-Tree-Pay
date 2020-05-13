@extends("layouts.page")
@section("title", "建立 QR")

@section("css")
<link rel="stylesheet" type="text/css" href="/css/qrcreate.css">
@endsection

@section("js")
<script type="text/javascript" src="/js/qrcreate.js"></script>
@endsection

@section("content")

@if($user->quota <= 0 && $user->role < 99)
@include("layouts.cross")
<p>您的餘額已使用完畢</p>

@else

@if($user->role < 99)
<p>您的餘額：{{ $user->quota }}</p>
@endif
<form method="GET" action="qr/create">
    <!-- 金額 -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">金額</div>
        </div>
        <input type="number" class="form-control" id="points" name="points" value="2000" min="0" max="9223372036854775807" pattern="[0-9]*" autofocus>
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button" id="btdef">重設</button>
        </div>
        <div class="invalid-feedback">
            金額不能為負！
        </div>
    </div>
    <!-- 金額按鈕 -->
    <div class="btn-group btn-group-lg mb-3" role="group">
        <button type="button" class="btn btn-secondary" id="btm1">-100</button>
        <button type="button" class="btn btn-secondary" id="btp1">+100</button>
    </div>
    <br>
    <div class="btn-group btn-group-lg mb-3" role="group">
        <button type="button" class="btn btn-secondary" id="btm5">-500</button>
        <button type="button" class="btn btn-secondary" id="btp5">+500</button>
    </div>
    <br>
    <div class="btn-group btn-group-lg mb-3" role="group">
        <button type="button" class="btn btn-secondary" id="btm10">-1000</button>
        <button type="button" class="btn btn-secondary" id="btp10">+1000</button>
    </div>
    <!-- 訊息 -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text" id="textarea-prepend">訊息</div>
        </div>
        <textarea class="form-control autoExpand" id="msg" name="msg" data-min-rows="1" rows="1" maxlength="255"></textarea>
        <div class="input-group-append">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">範本</button>
            <div class="dropdown-menu">
                <a class="dropdown-item">我是格魯特</a>
                <a class="dropdown-item">相信我，你比自己想像的更強</a>
                <a class="dropdown-item">九頭蛇萬歲</a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item">我是格魯特</a>
                <a class="dropdown-item">我是格魯特</a>
                <a class="dropdown-item">我是格魯特</a>
            </div>
        </div>
    </div>
    <button type="reset" class="btn btn-danger btn-lg">重設</button>
    <button type="submit" class="btn btn-primary btn-lg">建立</button>
</form>
@endif

@endsection
