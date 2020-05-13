@extends("layouts.page")
@section("title", "排行榜")

@section("css")
<link rel="stylesheet" type="text/css" href="/css/allteam.css">
@endsection

@section("js")
<script type="text/javascript" src="/js/allteam.js"></script>
@endsection

@section("content")

<h1>排行榜</h1>

<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="team-name">隊名</th>
            <th scope="col" class="points">聯盟幣</th>
        </tr>
    </thead>
    <tbody>
@foreach( $teams as $item )

@if($user->tid == $item->tid)
<tr class="table-primary">
@else
<tr>
@endif
    <th scope="row">{{ $item->tid }}</th>
    <td class="team-name">{{ $item->name }}</td>
    <td id="team{{ $item->tid }}" class="points" data-point="{{ $item->points }}"></td>
</tr>

@endforeach
    </tbody>
</table>

@endsection
