@include('includes.head')

@include('includes.header')


<div class="container text-center">


  <h4 class="subTitle_3 my-3" style="letter-spacing: 0.05em;"><b>現場データ<br/>ー更新・削除ー</b></h4>


    <!-- バリデーション処理 -->

    @isset($old_update)
      <div class="flashingWarning text-danger h4 my-3">データを更新しました。</div>
    @endisset


  <div class="row">
    <div class="col"></div>


    <div class="m-1">
      <form action="/onsite_update_delete" method="post">

        <table class="table recordTable">
        @csrf
          @foreach($field_s as $field)
            <input type="hidden" name="id" value="{{$field->id}}">
            <tr>
              <th class="bg-secondary py-4">現　場　名</th>
              <td class="bg-success text-left">
                <input class="form-control mt-1 pl-2" name="name" type="text" value="{{$field->name}}"  placeholder="現場名" style="width: 200px;">
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


</div>


@include('includes.footer')