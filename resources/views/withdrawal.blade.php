@include('includes.head')

@include('includes.header')


<div class="content container-fluid">

@if(session()->get('pagepass') != decrypt($user->pagepass))
    <div class="bg-danger border-right border-left py-3 rounded-circle text-center">
        <h2 class="my-5">※ページパスが不一致です。</h2>
        <p class="my-4">（管理者用ページの表示には、パス認証が必要です。）</p>
    </div>
@else


  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" style="box-shadow: 0px 0px 10px 0 rgba(10, 78, 230, 0.2); border:2px solid rgba(0, 80, 235, 0.2);">

        <div class="card-header text-center text-danger h5">退会ボタンを押して下さい</div>

        <div class="card-body pb-2">
          <form method="POST" action="/withdrawal">
            @csrf

            <div class="text-center mb-2">
              <button name="withdrawalBtn" type="submit" class="withdrawalBtn btn btn-primary">　退会　</button>
            </div> 
            
          </form>
        </div>

      </div>
    </div>
  </div>

  <a href="/" class="d-block text-center mt-4">＜＜&nbsp;ホーム画面に戻る&nbsp;＞＞</a>


@endif

</div>


@include('includes.footer')