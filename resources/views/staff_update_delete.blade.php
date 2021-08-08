@include('includes.head')

@include('includes.header')


<div class="container text-center">


  <h4 class="subTitle_2 my-3" style="letter-spacing: 0.05em;"><b>スタッフデータ<br/>ー更新・削除ー</b></h4>

    @if($errors->has('name'))
    <div class="flashingWarning">
        <div class="text-danger h4 mt-3">※同じ現場に、</div>
        <div class="text-danger h4 mb-3">同じ名前のスタッフ名で更新はできません。</div>
    </div>
    @else
      @isset($old_update)
        <div class="flashingWarning text-danger h4 my-3">データを更新しました。</div>
      @endisset
    @endif

  <div class="row">
    <div class="col"></div>

    @if($staff_isEmpty == true)
      <div class="h4">データがありません。</div>
    @else
      <div class="m-1">
        <form action="/staff_update_delete" method="POST">

          <table class="table recordTable">
          @csrf
            <input type="hidden" name="pagepass2" value="{{$passpage2}}">
            @foreach($staff_s as $staff)
              <input type="hidden" name="id" value="{{$staff->id}}">
              <tr>
                <th class="bg-secondary pt-3">現　場　名</th>
                <td class="bg-primary text-left">
                  <select name="field_id" class="field_id p-1" style="width: 200px;">
                    @foreach($fields as $field)
                      @if($staff->field_id == $field->id)
                        <option value="{{$field->id}}" selected>{{$field->name}}</option>
                      @continue
                      @else
                        <option value="{{$field->id}}">{{$field->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th class="bg-secondary py-4">スタッフ名</th>
                <td class="bg-primary text-left">
                  <input class="form-control mt-1 pl-2" name="name" type="text" value="{{$staff->name}}" placeholder="スタッフ名" style="width: 200px;">
                </td>
              </tr>
            @endforeach
          </table>

          <div class="my-4">
              <button name="update" value="true" type="submit" class="staff_updateBtn btn btn-primary btn-lg border mt-1 mr-4">更新</button>
              <button name="delete" value="true" type="submit" class="staff_deleteBtn btn btn-secondary btn-lg border mt-1 ml-4">削除</button>
          </div>

        </form>
      </div>
    @endif

    <div class="col"></div>
  </div>


</div>


@include('includes.footer')