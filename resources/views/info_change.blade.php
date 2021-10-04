@include('includes.head')

@include('includes.header')


<div class="container mainContents text-center">

@if(session()->get('pagepass') != decrypt($user->pagepass))
    <div class="bg-danger border-right border-left py-3 rounded-circle">
        <h2 class="my-5">※ページパスが不一致です。</h2>
        <p class="my-4">（管理者用ページの表示には、パス認証が必要です。）</p>
    </div>
@else


    <h2 class="subTitle_4 pt-1 pb-2 mb-4" style="letter-spacing: 0.01em;"><b>ー ユーザー情報変更 ー</b></h2>

    @if($errors->has('email'))
        <div class="my-3">
        <div class="flashingWarning text-danger h4">※指定のメールアドレスは使用することができません。</div>
        <div class="flashingWarning text-danger">（申し訳ありませんが、入力変更をやり直して下さい。）</div>
        </div>
    @else
        @isset($old_infoChange)
        <div class="flashingWarning text-danger h4 my-3">データを更新しました。</div>
        @endisset
    @endif

    <div class="my-1">
        <form action="/info_change" method="POST">
        @csrf

            <table class="noset-table table table-dark recordTable">
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">名前(会社名)</th>
                    <td class="px-3 align-middle"  colspan="2">
                        <input name="name" class="form-control border-secondary" type="text" value="{{$user->name}}" style="width: 250px; margin: 0 auto;" required data-name="{{$user->name}}">
                    </td>
                </tr>
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">メールアドレス</th>
                    <td class="px-3 align-middle" colspan="2">
                        <input name="email" class="form-control border-secondary" type="email" value="{{$user->email}}" style="width: 250px; margin: 0 auto;" required data-email="{{$user->email}}">
                    </td>
                </tr>
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">ページパスワード<br/><div class="text-center"><button id="btn-toggle-pagepass" class="btn btn-dark btn-sm mt-1" type="button"><i class="toggle-pagepass fas fa-eye-slash"></i></button></div></th>
                    <td class="px-3 align-middle" colspan="2">
                        <input name="pagepass" class="form-control border-secondary" type="password" value="{{decrypt($user->pagepass)}}" style="width: 250px; margin: 0 auto;" required data-pagepass="{{decrypt($user->pagepass)}}">
                    </td>
                </tr>
                <tr class="recordData table-secondary text-dark">
                    <th class="depons_th px-3 align-middle text-left" data-depons="{{$user->department_onsite}}">現場 or 部署</th>
                    <td class="px-3 align-middle" style="border-right:gray;">
                    @if($user->department_onsite == 1)
                        <div>現場</div>
                        <input type="radio" name="department_onsite" value="1" class="mr-1" checked>
                    </td>
                    <td class="px-3 align-middle" style="border-right:gray;">
                        <div>部署</div>
                        <input type="radio" name="department_onsite" value="0" class="ml-2" required>
                    @elseif($user->department_onsite == 0)
                        <div>現場</div>
                        <input type="radio" name="department_onsite" value="1" class="mr-1" required>
                    </td>
                    <td class="px-3 align-middle" style="border-right:gray;">
                        <div>部署</div>
                        <input type="radio" name="department_onsite" value="0" class="ml-2" checked>
                    @endif
                    </td>
                </tr>
            </table>

            <button name="infoChange" value="true" type="submit" class="infochangeBtn strSearch btn btn-danger btn-lg mt-2 mb-4 px-3" >変更</button>

            <div class="mark text-danger my-3">※使用できないメールアドレスで変更ボタンを押すと、<br/>すべての入力変更がやり直しになります。</div>
            <div class="mark text-danger mb-3">※ページパスワードは勤怠管理者用画面で使用するパスワードです。<br/>ログインパスワードとは異なります。</div>
            <div class="mark text-danger mb-3">※ページパスワードの「0」や「000…」のゼロとそのゾロ目は、未入力の扱いになります。</div>

        </form>
    </div>


@endif

</div>


@include('includes.footer')