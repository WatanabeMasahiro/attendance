@include('includes.head')

@include('includes.header')


<div class="container text-center">

@if(session()->get('pagepass') != decrypt($user->pagepass))
    <div class="bg-danger border-right border-left py-3 rounded-circle">
        <h2 class="my-5">※ページパスが不一致です。</h2>
        <p class="my-4">（管理者用ページの表示には、パス認証が必要です。）</p>
    </div>
@else


  <h4 class="subTitle_1 my-4" style="letter-spacing: 0.05em;"><b>出退勤データ<br/>ー更新・削除ー</b></h4>

  @if($errors->has('remarks'))
      <div class="flashingWarning text-danger h4 my-3">※データが更新できません。<p class="mt-2 h5">（備考欄の文字数を、おおよそ1000文字までにしてください。）</p></div>
  @elseif(old('update') == true)
      <div class="flashingWarning text-danger h4 my-3">データを更新しました。</div>
  @endif


    @if($content_isEmpty == true)
      <div class="h4">データがありません。</div>
    @else
      <div class="row">
        <div class="col"></div>

        <div class="m-1">
          <form action="/content_update_delete" method="POST">
          @csrf
            <table class="table recordTable my-2">
              @foreach($content_s as $content)
                <input type="hidden" name="id" value="{{encrypt($content->id)}}">
                <tr>
                  <th class="bg-secondary">日　時</th>
                  <td class="bg-info text-left">
                      <input class="pl-1" type="datetime-local" name="edited_at" value="{{$content->edited_at->format('Y-m-d')}}T{{$content->edited_at->format('H:i')}}" data-edited_at="{{$content->edited_at->format('Y-m-d')}}T{{$content->edited_at->format('H:i')}}">
                  </td>
                </tr>
                <tr>
                  <th class="d_o_name bg-secondary pl-3 pr-1" style="letter-spacing: 1em;">{{$department_onsite . "名"}}</th>
                  <td class="bg-info text-left">
                    <input class="pl-1" type="text" name="field_name" value="{{$content->field_name}}" style="width: 200px;" data-field_name="{{$content->field_name}}">
                  </td>
                </tr>
                <tr>
                  <th class="bg-secondary">スタッフ名</th>
                  <td class="bg-info text-left">
                    <input class="pl-1" type="text" name="staff_name" value="{{$content->staff_name}}" data-staff_name="{{$content->staff_name}}">
                  </td>
                </tr>
                <tr>
                  <th class="punch_th bg-secondary" data-punch="{{$content->punch}}">出　退</th>
                  <td class="bg-info text-left">
                    <select name="punch" class="p-1" required>
                      @if($content->punch == 1)
                        <option value="1" selected>出勤</option>
                        <option value="0">退勤</option>
                      @elseif($content->punch == 0)
                        <option value="1">出勤</option>
                        <option value="0" selected>退勤</option>
                      @endif
                    </select>
                  </td>
                </tr>
                <tr>
                  <th class="bg-secondary" style="border-bottom: solid 1px white;">備　考</th>
                  <td class="bg-info">
                    <textarea class="px-2 py-1" name="remarks" rows="8" cols="40" data-remarks="{{$content->remarks}}">{{$content->remarks}}</textarea>
                  </td>
                </tr>
                @endforeach
            </table>


            <div class="my-4">
                <button name="update" value="true" type="submit" class="content_updateBtn btn btn-info btn-lg border mt-1 mr-4">更新</button>
                <button name="delete" value="true" type="submit" class="deleteBtn btn btn-secondary btn-lg border mt-1 ml-4">削除</button>
            </div>

          </form>
        </div>

        <div class="col"></div>
      </div>

      <div class="text-danger">※備考欄の文字数は、おおよそ1000文字までです。</div>
    @endif


@endif

</div>


@include('includes.footer')