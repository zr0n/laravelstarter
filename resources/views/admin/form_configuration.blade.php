@extends('admin.layout')

@section('content')
<div class="col-md-4">
  @if(session('success'))
    <div class="alert alert-success">
      <p> Dados alterados com sucesso! </p>
    </div>
  @endif
  {{Form::open( ['url' => 'admin/configuration', 'method' => 'put'] )}}
    <div class="form-group">
      <label>Telefone</label>
      <input type="text" name="telephone" class="form-control"   placeholder="Insira o número de telefone" value="{{$config->telephone}}">
      @if(isset($formError['telephone']))
        <small class="form-text text-muted alert-danger">{{$formError['telephone']}}</small>
      @endif
    </div>
    <div class="form-group">
      <label>Celular</label>
      <input type="text" name="cellphone" class="form-control"   placeholder="Insira o número de celular" value="{{$config->cellphone}}">
      @if(isset($formError['cellphone']))
        <small class="form-text text-muted alert-danger">{{$formError['cellphone']}}</small>
      @endif
    </div>
    <div class="form-group">
      <label>Endereço</label>
      <input type="text" name="address" class="form-control"   placeholder="Insira o endereço da instituição" value="{{$config->address}}">
      @if(isset($formError['address']))
        <small class="form-text text-muted alert-danger">{{$formError['address']}}</small>
      @endif
    </div>
    <div class="form-group">
      <label>Endereço de email mostrado nos emails enviados</label>
      <input type="email" name="from_email" class="form-control"   placeholder="Insira o endereço de email" value="{{$config->from_email}}">
      @if(isset($formError['from_email']))
        <small class="form-text text-muted alert-danger">{{$formError['from_email']}}</small>
      @endif
    </div>
    <div class="form-group">
      <label>Texto da página inicial</label>
      <textarea name="home_text" class="form-control"   placeholder="Insira o texto da página inicial aqui">{{$config->home_text}}</textarea>
      @if(isset($formError['home_text']))
        <small class="form-text text-muted alert-danger">{{$formError['home_text']}}</small>
      @endif
    </div>

    <button type="submit" class="btn btn-success pull-right"> Enviar </button>
  {{Form::close()}}
</div>
@endsection
