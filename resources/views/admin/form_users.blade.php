@extends('admin.layout')

@section('content')
<div class="col-md-4">
  @if(Request::path() == 'users/create' || Request::path() == 'users')
    {{Form::open( ['url' => 'users', 'method' => 'post'] )}}
  @else
    {{Form::open( ['url' => 'users/'.$user->id, 'method' => 'put'] )}}
  @endif
    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="name" class="form-control"  required="true" placeholder="Insira o nome" value="{{$user->name}}">
      @if(isset($formError['name']))
        <small class="form-text text-muted alert-danger">{{$formError['name']}}</small>
      @endif
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control"  required="true" placeholder="Insira o email" value="{{$user->email}}">
      @if(isset($formError['email']))
        <small class="form-text text-muted alert-danger">{{$formError['email']}}</small>
      @endif
    </div>
    <div class="form-group">

      <label>Senha</label>
      @if(isset($formError['password']))
        <small class="form-text text-muted alert-danger">{{$formError['password']}}</small>
      @endif
      <input name="password" pattern=".{6,12}" type="password" class="form-control"  placeholder="Insira a senha">
    </div>

    <div class="form-group">
      <label>Confirme sua senha</label>
      <input name="password2" pattern=".{6,12}"  type="password" class="form-control"  placeholder="Confirme sua senha">
    </div>
    <button type="submit" class="btn btn-success pull-right"> Enviar </button>
  {{Form::close()}}
</div>
@endsection
