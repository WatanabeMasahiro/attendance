@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
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
                <div class="card-header h5 text-center text-dark" style="letter-spacing: 0.05em"><b>{{ __('ログイン情報を入力') }}</b></div>
>>>>>>> test1

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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
                                        <strong>メールアドレスかパスワードが間違っています。</strong>
>>>>>>> test1
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
=======
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード ') }}</label>
>>>>>>> test1

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
<<<<<<< HEAD
                                        <strong>{{ $message }}</strong>
=======
                                        <strong>メールアドレスかパスワードが間違っています。</strong>
>>>>>>> test1
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
<<<<<<< HEAD
                                        {{ __('Remember Me') }}
=======
                                        {{ __('ログイン情報を保存') }}
>>>>>>> test1
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
<<<<<<< HEAD
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
=======

                              <div class="d-md-none col-md-12 mt-2 mb-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>
                              </div>

                              <div class="d-none d-md-block col-md-12 mb-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>
                              </div>

                              <div class="d-md-none col-md-12">
                                @if (Route::has('register'))
                                    <a class="btn btn-link col-md-12" href="{{ route('register') }}">{{ __('ユーザー登録') }}</a>
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link col-md-12" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方') }}
                                    </a>
                                @endif
                              </div>

                              <div class="d-none d-md-block col-md-12">
                                @if (Route::has('register'))
                                    <a class="btn btn-link pl-1" href="{{ route('register') }}">{{ __('ユーザー登録') }}</a>
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pl-1" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方') }}
                                    </a>
                                @endif
                              </div>

>>>>>>> test1
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
