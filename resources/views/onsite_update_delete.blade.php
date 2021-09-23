@include('includes.head')

@include('includes.header')


<div class="container text-center">

@if(session()->get('pagepass') != decrypt($user->pagepass))
    <div class="bg-danger border-right border-left py-3 rounded-circle">
        <h2 class="my-5">※ページパスが不一致です。</h2>
        <p class="my-4">（管理者用ページの表示には、パス認証が必要です。）</p>
    </div>
@else


  <h4 class="subTitle_3 my-3" style="letter-spacing: 0.05em;"><b>{{$department_onsite}}データ<br/>ー更新・削除ー</b></h4>

    @if($errors->has('name'))
        <div class="flashingWarning text-danger h4 my-3">※データが更新できません。<p class="mt-2 h5">（登録済データと異なる{{$department_onsite}}名で更新してください。）</p></div>
    @elseif(old('update') == true)
        <div class="flashingWarning text-danger h4 my-3">データを更新しました。</div>
    @endif


    @if($field_isEmpty == true)
      <div class="h4 my-4">データがありません。</div>
    @else
      <div class="row">
        <div class="col"></div>

        <div class="m-1">
          <form action="/onsite_update_delete" method="POST">

            <table class="table recordTable">
            @csrf

              @foreach($field_s as $field)
              <input type="hidden" name="id" value="{{encrypt($field->id)}}">

                <tr>
                  <th class="opt_name bg-secondary py-4 pl-3 pr-0" 
                  style="letter-spacing: 1em;">{{$department_onsite . '名'}}</th>
                  <td class="bg-success text-left">
                    <input class="form-control mt-1 pl-2" name="name" type="text" value="{{$field->name}}"  placeholder="{{$department_onsite . '名'}}" style="width: 200px;" data-name="{{$field->name}}">
                  </td>
                </tr>
              @endforeach
            </table>

            <div class="my-4">
                <button name="update" value="true" type="submit" class="onsite_updateBtn btn btn-success btn-lg border mt-1 mr-4">更新</button>
                <button name="delete" value="true" type="submit" class="onsite_deleteBtn btn btn-secondary btn-lg border mt-1 ml-4">削除</button>
            </div>

          </form>
        </div>

        <div class="col"></div>
      </div>

      <div class="text-danger">※{{$department_onsite}}データを削除すると、<br/>その{{$department_onsite}}に登録されているスタッフデータも削除されます。</div>
    @endif


@endif

</div>


@include('includes.footer')