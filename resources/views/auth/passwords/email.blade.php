@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
                <div class="card-header text-center text-dark h5"><b>{{ __('パスワードのリセット') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            メールを送信しました。送信メールから<br/>
                            パスワードのリセットを行って下さい。
>>>>>>> test1
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
=======
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
>>>>>>> test1

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
<<<<<<< HEAD
                                        <strong>{{ $message }}</strong>
=======
                                        <strong>エラーが発生しました。<br/>
                                                アドレスを確認し、再度お試し下さい。</strong>
>>>>>>> test1
                                    </span>
                                @enderror
                            </div>
                        </div>

<<<<<<< HEAD
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
=======
                        <div class="form-group row d-md-none text-center mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('　送信　') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row d-none d-md-block mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('　送信　') }}
                                </button>
                            </div>
                        </div>

>>>>>>> test1
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
    <a href="/login" class="d-block text-center mt-4">＜＜&nbsp;ログイン画面に戻る&nbsp;＞＞</a>
</div>

>>>>>>> test1
@endsection
