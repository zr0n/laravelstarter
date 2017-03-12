@extends('admin.layout')

@section('content')
<div class="row">
  <div class="col-md-10" id="admin-gallery">
    @if(session('success'))
      <div class="alert alert-success">
        <p> Dados enviados com sucesso! </p>
      </div>
    @endif
    @if(sizeof($images))
    @foreach($images as $image)
      <a href="{{URL::to('admin/gallery/'.$image->id.'/edit/')}}">
        <img  src="{{Cloudder::secureShow($image->cloudinary_id, ['width' => 300, 'height' => '300', 'crop' => 'fill'])}}">
      </a>
    @endforeach
    @else
    <div class="alert alert-info">
        <p>Não existem imagens na galeria.</p>
    </div>
    @endif
    <div class="row">
      <a href="{{URL::to('admin/gallery/create')}}" class='btn btn-success'>
        <i class="glyphicon glyphicon-plus"></i> &nbsp; Inserir Imagem
      </a>
    </div>
  </div>
</div>
@endsection
