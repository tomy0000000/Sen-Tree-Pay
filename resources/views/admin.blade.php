@extends("layouts.page") @section("title", "管理員界面") @section("css")
<link rel="stylesheet" type="text/css" href="/css/admin.css"> @endsection @section("js")
<script type="text/javascript" src="/js/admin.js"></script>
@endsection @section("content")
<!--  -->
<h1 id="guide">快速捷徑</h1>
<a href="#heiLanSha">
    <button type="button" class="btn btn-success btn-lg m-2">黑蘭煞狀態</button>
</a>
<a href="#qrststus">
    <button type="button" class="btn btn-primary btn-lg m-2">QR狀態</button>
</a>
<a href="#userstatus">
    <button type="button" class="btn btn-warning btn-lg m-2">用戶資料</button>
</a>
<button type="button" class="btn btn-dark btn-lg m-2" onclick="window.history.go(-1)">
    <i class="fas fa-arrow-left"></i>&ensp;返回
</button>
<!--   ######  ##     ##    ###    ########   ######   ########  -->
<!--  ##    ## ##     ##   ## ##   ##     ## ##    ##  ##        -->
<!--  ##       ##     ##  ##   ##  ##     ## ##        ##        -->
<!--  ##       ######### ##     ## ########  ##   #### ######    -->
<!--  ##       ##     ## ######### ##   ##   ##    ##  ##        -->
<!--  ##    ## ##     ## ##     ## ##    ##  ##    ##  ##        -->
<!--   ######  ##     ## ##     ## ##     ##  ######   ########  -->
<h1>最新20筆儲值記錄</h1>
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">時間</th>
            <th scope="col">訊息</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $logs as $log )
        <tr>
            <th scope="row">{{ $log->created_at }}</th>
            <td>{{ $log->text }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--  ##     ## ######## #### ##          ###    ##    ##  ######  ##     ##    ###     -->
<!--  ##     ## ##        ##  ##         ## ##   ###   ## ##    ## ##     ##   ## ##    -->
<!--  ##     ## ##        ##  ##        ##   ##  ####  ## ##       ##     ##  ##   ##   -->
<!--  ######### ######    ##  ##       ##     ## ## ## ##  ######  ######### ##     ##  -->
<!--  ##     ## ##        ##  ##       ######### ##  ####       ## ##     ## #########  -->
<!--  ##     ## ##        ##  ##       ##     ## ##   ### ##    ## ##     ## ##     ##  -->
<!--  ##     ## ######## #### ######## ##     ## ##    ##  ######  ##     ## ##     ##  -->
<div class="row justify-content-md-center">
    <a href="#guide" class="col-md-auto my-auto">
        <button type="button" class="btn btn-secondary btn-lg">回頂層</button>
    </a>
    <h1 id="heiLanSha" class="col">黑蘭煞狀態</h1>
    <a href="#guide" class="col-md-auto my-auto" onclick="window.history.go(-1)">
        <button type="button" class="btn btn-secondary btn-lg">
            <i class="fas fa-arrow-left"></i>&ensp;返回
        </button>
    </a>
</div>
<form id="edit_quota_form">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">更新</th>
                <th scope="col">姓名</th>
                <th scope="col">學號</th>
                <th scope="col">餘額</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $heilansha as $user )
            <tr>
                <th scope="row" class="align-middle text-center">
                    <input class="form-check-input m-auto" type="checkbox" name="editusers[]" value="{{ $user->sid }}">
                </th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->sid }}</td>
                <td>{{ $user->quota }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-md-center">
        <div class="btn-group btn-group-toggle col-auto my-3 mx-auto" data-toggle="buttons">
            <label class="btn btn-secondary active">
                <input type="radio" name="action" value="set" id="option1" checked>調整
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="action" value="add" id="option2">增加
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="action" value="sub" id="option3">減少
            </label>
        </div>
        <div class="col-auto my-3 mx-auto">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">金額</div>
                </div>
                <input type="number" class="form-control" id="points" name="points" value="5000">
            </div>
        </div>
        <div class="col-auto my-3 mx-auto">
            <button type="button" id="quota_send" class="btn btn-primary">更改</button>
        </div>
    </div>
</form>
<!-- #######  ########   -->
<!--  ##     ## ##     ##  -->
<!--  ##     ## ##     ##  -->
<!--  ##     ## ########   -->
<!--  ##  ## ## ##   ##    -->
<!--  ##    ##  ##    ##   -->
<!--   ##### ## ##     ##  -->
<div class="row justify-content-md-center">
    <a href="#guide" class="col-md-auto my-auto">
        <button type="button" class="btn btn-secondary btn-lg">回頂層</button>
    </a>
    <h1 id="qrststus" class="col">QR狀態</h1>
    <a href="#guide" class="col-md-auto my-auto" onclick="window.history.go(-1)">
        <button type="button" class="btn btn-secondary btn-lg">
            <i class="fas fa-arrow-left"></i>&ensp;返回
        </button>
    </a>
</div>
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">建立日期</th>
            <th scope="col">點數</th>
            <th scope="col">發行人</th>
            <th scope="col">訊息</th>
            <th scope="col">狀態 (QR)</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $qrs as $item )
        <tr>
            <th scope="row">{{$item->created_at->format("m/d H:i:s") }}</th>
            <td>{{$item->points }}</td>
            <td>{{ $item->creator }}</td>
            <td class="popover-container">
                <a tabindex="0" class="btn btn-primary" data-toggle="popover" data-trigger="focus" title="{{ $item->updated_at->format('m/d H:i:s') }}儲值" data-content="{{ $item->msg }}"><i class="fas fa-info-circle"></i></a>
            </td>
            <td>
                @if($item->used == 1)
                <!-- <span class="badge badge-danger">已使用</span> -->
                <a href="qrcodes/{{$item->serial}}.png">
                    <button type="button" class="btn btn-danger btn-sm" disabled>已使用</button>
                </a>
                <!-- <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a> -->
                @else
                <!-- <span class="badge badge-success">未使用</span> -->
                <a href="qrcodes/{{$item->serial}}.png">
                    <button type="button" class="btn btn-success btn-sm">未使用</button>
                </a>
                @endif
            </td>
            <!-- <td> -->
                <!-- <a href="qrcodes/{{$item->serial}}.png">QR</a> -->
            <!-- </td> -->
        </tr>
        @endforeach
    </tbody>
</table>
<!-- ##     ##  ######  ######## ########   -->
<!--  ##     ## ##    ## ##       ##     ##  -->
<!--  ##     ## ##       ##       ##     ##  -->
<!--  ##     ##  ######  ######   ########   -->
<!--  ##     ##       ## ##       ##   ##    -->
<!--  ##     ## ##    ## ##       ##    ##   -->
<!--   #######   ######  ######## ##     ##  -->
<div class="row justify-content-md-center">
    <a href="#guide" class="col-md-auto my-auto">
        <button type="button" class="btn btn-secondary btn-lg">回頂層</button>
    </a>
    <h1 id="userstatus" class="col">用戶資料</h1>
    <a href="#guide" class="col-md-auto my-auto" onclick="window.history.go(-1)">
        <button type="button" class="btn btn-secondary btn-lg">
            <i class="fas fa-arrow-left"></i>&ensp;返回
        </button>
    </a>
</div>
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">姓名</th>
            <th scope="col">學號</th>
            <th scope="col">身分</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $users as $user )
        <tr>
            <th scope="row">{{ $user->name }}</th>
            <td>{{ $user->sid }}</td>
            <td>
                @if($user->role == 0)
                <span class="badge badge-success">第{{ $user->tid }}小隊小學員</span>
                @elseif($user->role == 10)
                <span class="badge badge-primary">第{{ $user->tid }}小隊隊輔</span>
                @elseif($user->role == 30)
                <span class="badge badge-danger">{{ $user->identity }}</span>
                @elseif($user->role == 99)
                <span class="badge badge-warning">Master</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--  -->
@endsection
