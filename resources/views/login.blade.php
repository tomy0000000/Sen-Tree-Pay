@extends("layouts.page")
@section("title", "Sen tree pay")
@section("cssname", "login")
@section("jsname", "login")
@section("content")
<img src="{{ asset('img/hero-trans.png') }}" class="img-fluid" alt="Hero">
<h3>Welcome Back</h3>
<form method="GET" action="login" id="loginForm">
    <input type="text" id="userPassword" name="password" class="form-control" placeholder="六碼識別碼" maxlength="6" autofocus>
</form>
@endsection
@section("hideBtnBack", "")
