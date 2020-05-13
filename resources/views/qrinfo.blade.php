@extends("layouts.page")

@section("title", "兌換資訊")

@section("content")
	<!-- <p class="text-center">序號：{{ $qr->serial }}</p> -->
	<h1>${{ $qr->points }}</h1>
	<p>{{ $qr->msg }}</p>
	<p>By {{ $qr->creator }}</p>
	<form method="POST" action="/qr/deposit/{{ $qr->serial }}">
		<input type="hidden" name="serial" value="{{ $qr->serial }}" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		@if( !$qr->used )
		<button type="submit" class="btn btn-primary btn-lg">儲值！</button>
		@else
		<button type="submit" class="btn btn-danger btn-lg disabled">被搶先了QQ</button>
		@endif
	</form>

@endsection
