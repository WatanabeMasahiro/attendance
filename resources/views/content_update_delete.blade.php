@include('includes.head')

@include('includes.header')


<div class="container text-center">


  <h4 class="subTitle_1 my-4" style="letter-spacing: 0.05em;"><b>出退勤データ<br/>ー更新・削除ー</b></h4>

  <!-- バリデーション処理 -->

  @isset($old_update)
  <div class="flashingWarning text-danger h4 my-3">データを更新しました。</div>
  @endisset


  <div class="row">
    <div class="col"></div>


    <div class="m-1">
      <form action="/content_update_delete" method="post">

        <table class="table recordTable my-2">
        @csrf
          @foreach($content_s as $content)
            <input type="hidden" name="id" value="{{$content->id}}">
            <tr>
              <th class="bg-secondary">日　時</th>
              <td class="bg-info text-left">
                <input type="datetime-local" name="updated_at" value="{{$content->updated_at->format('Y-m-d')}}T{{$content->updated_at->format('H:i')}}">
              </td>
            </tr>
            <tr>
              <th class="bg-secondary">現　場　名</th>
              <td class="bg-info text-left">
                <input type="text" name="field_name" value="{{$content->field_name}}" style="width: 200px;">
              </td>
            </tr>
            <tr>
              <th class="bg-secondary">スタッフ名</th>
              <td class="bg-info text-left">
                <input type="text" name="staff_name" value="{{$content->staff_name}}">
              </td>
            </tr>
            <tr>
              <th class="bg-secondary">出　退</th>
              <td class="bg-info text-left">
                <select name="punch" class="p-1">
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
                <textarea class="px-2 py-1" name="remarks" rows="8" cols="40">{{$content->remarks}}</textarea>
              </td>
            </tr>
            @endforeach
        </table>


        <div class="my-4">
            <button name="update" value="true" type="submit" class="updateBtn btn btn-info btn-lg border mt-1 mr-4">更新</button>
            <button name="delete" value="true" type="submit" class="deleteBtn btn btn-secondary btn-lg border mt-1 ml-4">削除</button>
        </div>

      </form>
    </div>


    <div class="col"></div>
  </div>


</div>


@include('includes.footer')