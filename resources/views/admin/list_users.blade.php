@extends('admin.layout')

@section('content')
<div class="row">
  <div class="col-md-12">
    <table class='table'>
      <thead>
        <th> ID </th>
        <th> Nome </th>
        <th> Email </th>
        <th> Última Edição </th>
        <th> Ação</th>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td> {{ Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s')}}</td>
          <td>
            <a href="{{URL::to('users/'.$user->id.'/edit')}}">
              <i title="Editar" class="glyphicon glyphicon-pencil user-edit"></i>
            </a>
            &nbsp;
            <a href="{{route('userDelete', ['id' => $user->id])}}">
              <i title="Excluir" class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div>
      <a href="{{URL::to('users/create')}}" class="btn btn-success"> Criar Usuário </a>
    </div>
@endsection
