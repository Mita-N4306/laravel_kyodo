@extends('layouts.app')
@section('content')
<div class="userlist-container">
    <h1>ユーザー一覧(管理者専用)</h1>
    <img src="{{ asset('img/user_list.png')}}" alt="ユーザー一覧画像">
    <table>
     <thead class="userlist-table-head">
       <tr>
        <th>id</th>
        <th>名前</th>
        <th>email</th>
       </tr>
     </thead>
     <tbody class="userlist-table-body">
      @foreach($users as $user)
       <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
       </tr>
      @endforeach
     </tbody>
    </table>
</div>
@include('commons.return_back')
@endsection

