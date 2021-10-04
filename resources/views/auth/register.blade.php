@extends('layouts.app')

@section('content')

<div id="siteTitle" class="siteTitle text-center">
  <h1 class="siteTitle mt-5 pb-1">
    <a href="/login" style="text-decoration: none;">
      <b class="text-danger"><i class="fas fa-user-clock mr-3"></i>出退勤システム</b>
    </a>
  </h1>
</div>

<hr class="w-75 pb-0 mb-0">


<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('登録するユーザー情報を入力') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前(会社名)') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right py-0">{{ __('パスワード') }}<button id="btn-toggle-pw" class="btn btn-dark btn-sm ml-1 p-0" type="button"><i class="toggle-pw fas fa-eye-slash"></i></button><br/><p class="mb-0" style="font-size:0.6em;">(※8文字以上)</p></label>

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

                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-size: 0.94em;">{{ __('パスワード') }}<button id="btn-toggle-pwConfirm" class="btn btn-dark btn-sm ml-1 p-0" type="button"><i class="toggle-pwConfirm fas fa-eye-slash"></i></button><br/><p class="mb-0" style="font-size:0.6em;">(確認用)</p></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="pagepass" class="col-md-4 col-form-label text-md-right py-0" style="font-size:0.9em;">{{ __('勤怠管理者用パス') }}<button id="btn-toggle-pp" class="btn btn-dark btn-sm ml-1 p-0" type="button"><i class="toggle-pp fas fa-eye-slash"></i></button><br/><p class="mb-0" style="font-size:0.6em;">(ページパスワード)</p></label>

                            <div class="col-md-6">
                                <input id="pagepass" type="password" class="form-control @error('pagepass') is-invalid @enderror" name="pagepass" value="{{ old('pagepass') }}" required>

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
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="/login" class="d-block text-center mt-4">＜＜&nbsp;ログイン画面に戻る&nbsp;＞＞</a>
</div>

@endsection
