@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">


    <h2 class="subTitle_4 pt-1 pb-2 mb-4" style="letter-spacing: 0.01em;"><b>ー ユーザー情報変更 ー</b></h2>

    @if($errors->has('name'))
      <div class="flashingWarning text-danger h4 my-3">※入力値が変更されていません。</div>
    @endif

    <div class="my-1">
        <form action="/info_change" method="POST">
        @csrf
            <input name="id" type="hidden" value="{{$user->id}}">

            <table class="noset-table table table-dark recordTable">
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">名前(会社名)</th>
                    <td class="px-3 align-middle"  colspan="2">
                    @if(old('name') === null)
                        <input name="name" class="form-control border-secondary" type="text" value="{{$user->name}}" placeholder="{{$user->name}}" style="width: 250px; margin: 0 auto;">
                    @else
                        <input name="name" class="form-control border-secondary" type="text" value="{{old('name')}}" style="width: 250px; margin: 0 auto;">
                    @endif
                    </td>
                </tr>
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">メールアドレス</th>
                    <td class="px-3 align-middle" colspan="2">
                    @if(old('email') === null)
                        <input name="email" class="form-control border-secondary" type="email" value="{{$user->email}}" placeholder="{{$user->email}}" style="width: 250px; margin: 0 auto;">
                    @else
                        <input name="email" class="form-control border-secondary" type="email" value="{{old('email')}}" style="width: 250px; margin: 0 auto;">
                    @endif
                    </td>
                </tr>
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">ページパスワード</th>
                    <td class="px-3 align-middle" colspan="2">
                    @if(old('pagepass') === null)
                        <input name="pagepass" class="form-control border-secondary" type="password" value="{{$user->pagepass}}" style="width: 250px; margin: 0 auto;">
                    @else
                        <input name="pagepass" class="form-control border-secondary" type="password" value="{{old('pagepass')}}" style="width: 250px; margin: 0 auto;">
                    @endif
                    </td>
                </tr>
                <tr class="recordData table-secondary text-dark">
                    <th class="px-3 align-middle text-left">現場 or 部署</th>
                    <td class="px-3 align-middle" style="border-right:gray;">
                @if(old('department_onsite') === null) 
                    @if($user->department_onsite == 1)
                        <input type="radio" name="department_onsite" value="1" class="mr-1" checked>現場
                    </td>
                    <td class="px-3 align-middle" style="border-right:gray;">
                        <input type="radio" name="department_onsite" value="0" class="ml-2">部署
                    @elseif($user->department_onsite == 0)
                        <input type="radio" name="department_onsite" value="1" class="mr-1">現場
                    </td>
                    <td class="px-3 align-middle" style="border-right:gray;">
                        <input type="radio" name="department_onsite" value="0" class="ml-2" checked>部署
                    @endif
                @else
                    @if(old('department_onsite') == 1)
                        <input type="radio" name="department_onsite" value="1" class="mr-1" checked>現場
                    </td>
                    <td class="px-3 align-middle" style="border-right:gray;">
                        <input type="radio" name="department_onsite" value="0" class="ml-2">部署
                    @elseif(old('department_onsite') == 0)
                        <input type="radio" name="department_onsite" value="1" class="mr-1">現場
                    </td>
                    <td class="px-3 align-middle" style="border-right:gray;">
                        <input type="radio" name="department_onsite" value="0" class="ml-2" checked>部署
                    @endif
                @endif
                    </td>
                </tr>
            </table>

            <!-- <input name="infoChange" value="変更" class="infochangeBtn strSearch btn btn-danger btn-lg mt-1 px-3" type="submit"> -->

            <button name="infoChange" value="true" type="submit" class="infochangeBtn strSearch btn btn-danger btn-lg mt-1 px-3" >変更</button>

        </form>
    </div>


</div>


@include('includes.footer')