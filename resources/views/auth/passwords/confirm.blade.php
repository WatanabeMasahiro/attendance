@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}
=======

<div id="siteTitle" class="siteTitle text-center">
    <h1 class="siteTitle mt-5 pb-1">
        <a href="/login" style="text-decoration: none;">
            <b class="text-danger"><i class="fas fa-user-clock mr-3"></i>出退勤システム</b>
        </a>
    </h1>
</div>

<hr class="w-75 pb-0 mb-0">


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-danger h5">{{ __('パスワードの確認') }}</div>

                <div class="card-body">
>>>>>>> test1

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
=======
                            <label for="password" class="col-md-4 col-form-label text-md-right mt-1">{{ __('パスワード') }}</label>

                            <div class="col-md-6 mt-1">
>>>>>>> test1
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
<<<<<<< HEAD
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
=======
                                <button type="submit" class="btn btn-primary mt-1">
                                    {{ __('　送信　') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pl-1 mt-2" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方') }}
>>>>>>> test1
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

>>>>>>> test1
@endsection
