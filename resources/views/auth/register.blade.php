@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
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
                <div class="card-header text-center"><b>{{ __('登録するユーザー情報を入力') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前(会社名)') }}</label>
>>>>>>> test1

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
=======
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
>>>>>>> test1

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
=======
                            <label for="password" class="col-md-4 col-form-label text-md-right py-0">{{ __('パスワード') }}<br/><p class="mb-0" style="font-size:0.6em;">(※8文字以上)</p></label>
>>>>>>> test1

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
=======
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-size: 0.94em;">{{ __('パスワード(確認)') }}</label>
>>>>>>> test1

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

<<<<<<< HEAD
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
=======

                        <div class="form-group row">
                            <label for="pagepass" class="col-md-4 col-form-label text-md-right py-0" style="font-size:0.9em;">{{ __('勤怠管理者用パス') }}<br/><p class="mb-0" style="font-size:0.6em;">(ページパスワード)</p></label>

                            <div class="col-md-6">
                                <input id="pagepass" type="password" class="form-control @error('pagepass') is-invalid @enderror" name="pagepass" required>

                                @error('pagepass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department_onsite" class="col-md-4 col-form-label text-md-right">{{ __('所属名称の選択') }}</label>

                            <div class="col-md-6">
                                @if(old('department_onsite') === null)
                                <div class="form-check form-check-inline is-invalid">
                                    <input id="department_onsite1" type="radio" name="department_onsite" value="1" class="form-check-input form-check-inline form-control @error('department_onsite') is-invalid @enderror"  style="transform:scale(0.5);" required>
                                    <label class="form-check-label" for="onsite" style="width:100px;">現場</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid">
                                    <input id="department_onsite0" type="radio" name="department_onsite" value="0" class="form-check-input form-check-inline form-control @error('department_onsite') is-invalid @enderror" style="transform:scale(0.5);">
                                    <label class="form-check-label" for="department" style="width:100px;">部署</label>
                                </div>
                                @elseif(old('department_onsite') == 1)
                                <div class="form-check form-check-inline is-invalid">
                                    <input id="department_onsite1" type="radio" name="department_onsite" value="1" class="form-check-input form-check-inline form-control @error('department_onsite') is-invalid @enderror"  style="transform:scale(0.5);" required checked>
                                    <label class="form-check-label" for="onsite" style="width:100px;">現場</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid">
                                    <input id="department_onsite0" type="radio" name="department_onsite" value="0" class="form-check-input form-check-inline form-control @error('department_onsite') is-invalid @enderror" style="transform:scale(0.5);">
                                    <label class="form-check-label" for="department" style="width:100px;">部署</label>
                                </div>
                                @elseif(old('department_onsite') == 0)
                                <div class="form-check form-check-inline is-invalid">
                                    <input id="department_onsite1" type="radio" name="department_onsite" value="1" class="form-check-input form-check-inline form-control @error('department_onsite') is-invalid @enderror"  style="transform:scale(0.5);" required>
                                    <label class="form-check-label" for="onsite" style="width:100px;">現場</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid">
                                    <input id="department_onsite0" type="radio" name="department_onsite" value="0" class="form-check-input form-check-inline form-control @error('department_onsite') is-invalid @enderror" style="transform:scale(0.5);" checked>
                                    <label class="form-check-label" for="department" style="width:100px;">部署</label>
                                </div>
                                @endif

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>名称を選択してください。</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-12 text-center d-md-none col-md-12">
                                <button type="submit" class="auth_regBtn btn btn-primary registerBtn">
                                    {{ __('　登録　') }}
                                </button>
                            </div>

                            <div class="col-md-12 text-center d-none d-md-block pb-1">
                                <button type="submit" class="auth_regBtn btn btn-primary registerBtn">
                                    {{ __('　登録　') }}
>>>>>>> test1
                                </button>
                            </div>
                        </div>
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
