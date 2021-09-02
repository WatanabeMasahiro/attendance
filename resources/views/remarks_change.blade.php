@include('includes.head')

@include('includes.header')


<div class="container mainContents text-center">


    <h2 class="subTitle_6 pt-1 pb-2 mb-4" style="letter-spacing: 0.3em;"><b>ー 備考欄変更 ー</b></h2>

    @if($errors->has('remarks'))
      <div class="flashingWarning text-danger h4 my-3">※備考欄の文字数はおおよそ1000文字までです。</div>
    @endif


    <div class="my-1">
        <input class="form-control border-secondary text-center" type="password" style="width: 200px; margin: 0 auto;">
        <input value="送信" class="strSearch btn btn-secondary mt-1 px-3" type="submit">
    </div>


</div>


@include('includes.footer')