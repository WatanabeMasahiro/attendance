@include('includes.head')

@include('includes.header')


<div class="container text-center">

    <div class="subTitle_4 text-center pb-2" style="border-width: 1px;">
        <h2 class="subTitle_4 pt-1 pb-2" style="letter-spacing: 0.01em; border-width: 1px;"><b>ー 勤怠管理者用パス ー</b></h2>
    </div>

    @if($errors->has('pagepass'))
      <div class="flashingWarning text-danger h4 my-3">※パスワードが未入力です。</div>
    @elseif($pagepass_mistake == true)
        <div class="flashingWarning text-danger h4 my-3">ページパスが一致しませんでした。</div>
    @elseif($pagepass_success == true)
        <div class="flashingWarning text-primary h4 my-3">管理者として認証しました。</div>
    @endif

    <hr/>

    <form action="/pagepass" method="POST" class="border-right border-left">
    @csrf
        <div class="my-2 text-center">
        @if(session()->has('pagepass'))
            <div class="pt-3 my-1" style="letter-spacing: 0.01em;">認証解除ボタンを押すと、一般画面に切り替わります。</div>
            <button name="pagepass_output" type="submit" value="true" class="btn btn-danger m-3">認証解除</button>
        @else
            <div class="pt-2 my-4" style="letter-spacing: 0.01em;">管理認証ボタンを押すと一定時間、<br/>管理者用画面に切り替わります。</div>
            <div class="mb-3">管理者用パス（ページパスワード）を入力し、<br/>管理認証ボタンを押してください。</div>
            <table style="margin:0 auto;">
                <tr>
                    <td>
                        <input name="pagepass" type="password" class="form-control border-secondary text-center ml-4 mr-1" style="width: 200px; margin: 0 auto;" required>
                    </td>
                    <td>
                        <button id="btn-toggle-pagepass" class="btn btn-dark btn-sm" type="button">
                            <i class="toggle-pagepass fas fa-eye-slash"></i>
                        </button>
                    </td>
                </tr>
            </table>
            <button name="pagepass_input" type="submit" value="true" class="btn btn-success mt-2 mb-3">管理認証</button>
            <div class="text-danger">※一般画面に戻す場合は、認証解除ボタンを押してください。<br/>（認証済の間、認証解除ボタンが表示されます。）</div>
        @endif
        </div>
    </form>

    <hr/>

</div>


@include('includes.footer')