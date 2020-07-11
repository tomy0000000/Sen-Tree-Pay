@extends("layouts.page")
@section("title", "已產生QR")

@section("css")
<link rel="stylesheet" type="text/css" href="{{ asset('css/qrlist.css') }}">
@endsection

@section("content")
<h1>已產生QR</h1>
<table class="table table-hover w-auto">
    <thead class="thead-dark">
        <tr>
            <th scope="col">建立時間</th>
            <th scope="col">金鑰</th>
            <th scope="col">金額</th>
            <th scope="col">使用情形</th>
            <th scope="col">訊息</th>
            <th scope="col">QR</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $qrs as $item )
        <tr>
            <th scope="row">{{$item->created_at->format("m/d H:i:s") }}</th>
            <td>
                <a href="info/{{$item->serial}}">Key</a>
            </td>
            <td>{{$item->points }}</td>
            <td>
                @if($item->used == 1)
                <span class="badge badge-danger">已使用</span>
                @else
                <span class="badge badge-success">未使用</span>
                @endif
            </td>
            <td>{{$item->msg }}</td>
            <td>
                <a href="qrcodes/{{$item->serial}}.png">QR</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection