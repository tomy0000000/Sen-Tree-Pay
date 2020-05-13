@extends("layouts.page")

@section("title", "關於我")

@section("content")


    @if($user->role == 0)
        @if($user->nickname)
        <p>第 {{ $user->tid }} 小隊探員：{{ $user->name }}</p>
        <h1><i>aka.</i>{{ $user->nickname }}</h1>
        @else
        <p>第 {{ $user->tid }} 小隊探員：{{ $user->name }}</p>
        @endif
        <p>{{ $team->name }}</p>
        <p>目前餘額：${{ $team->points }}</p>
    @elseif($user->role == 10)
        @if($user->nickname)
        <p>第 {{ $user->tid }} 小隊英雄：{{ $user->name }}</p>
        <h1><i>aka.</i>{{ $user->nickname }}</h1>
        @else
        <p>第 {{ $user->tid }} 小隊英雄</p>
        @endif
        <p>{{ $team->name }}</p>
        <p>目前餘額：${{ $team->points }}</p>
    @elseif($user->role == 30)
        @if($user->nickname)
        @if($user->identity == "活動")
        <p>{{ $team->name }}幹員：{{ $user->name }}</p>
        @else
        <p>{{ $user->identity }}：{{ $user->name }}</p>
        @endif
        <h1><i>aka.</i>{{ $user->nickname }}</h1>
        @else
        <h1>{{ $team->name }}幹員：{{ $user->name }}</h1>
        @endif
    @elseif($user->role == 99)
        @if($user->nickname)
        <p>英雄製作人：{{ $user->name }}</p>
        <h1><i>aka.</i>{{ $user->nickname }}</h1>
        @else
        <h1>{{ $team->name }}大師：{{ $user->name }}</h1>
        @endif
    @endif
@endsection
