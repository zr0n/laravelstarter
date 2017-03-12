@extends('admin.layout')

@section('content')
<div class="col-md-4" id="admin-gallery">
  @if(Request::is('*/create') || Request::is('*/galery'))
    {{Form::open( ['url' => 'admin/gallery', 'method' => 'post', 'files' => true] )}}
    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="image" class="form-control"  required="true">
      @if(isset($formError['image']))
        <small class="form-text text-muted alert-danger">{{$formError['image']}}</small>
      @endif
    </div>
  @else
    {{Form::open( ['url' => 'admin/gallery/'.$image->id, 'method' => 'put'] )}}
      <img src="{{Cloudder::secureShow($image->cloudinary_id, ['width' => 600, 'height' => 600, 'crop' => 'fill'])}}">
  @endif

    <div class="form-group">
      <label>Descrição</label>
      <input type="text" name="description" maxlength="100" class="form-control"  required="true" value="{{$image->description}}">
      @if(isset($formError['description']))
        <small class="form-text text-muted alert-danger">{{$formError['description']}}</small>
      @endif
    </div>
    <button type="submit" class="btn btn-success pull-right"> Enviar </button>
    <a href="#" onClick="event.preventDefault(); document.getElementById('delete-form').submit()" class="btn btn-danger pull-right"> Deletar

    </a>
  {{Form::close()}}
  {{Form::open(['url' => URL::to('admin/gallery/'.$image->id), 'id' => 'delete-form', 'method' => 'delete'])}}
  {{Form::close()}}
</div>
@endsection
