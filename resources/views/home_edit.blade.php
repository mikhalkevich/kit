@extends('layouts.app')
@section('scripts')
 @parent
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script> 
 CKEDITOR.replace( 'body' );
</script>
@endsection 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Форма редактирования товара</div>

                <div class="card-body">
<form class="was-validated" action="{{asset('home/edit/'.$obj->id)}}" method="post" enctype="multipart/form-data">
  {!!csrf_field()!!}
  <div class="mb-3">
    <label for="name">Название товара</label>
    <input type="text" name="name" value="{{$obj->name}}" class="form-control is-invalid" id="name">
   @error('name')
     <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
     </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="price">Цена</label>
    <input type="text" name="price" value="{{$obj->price}}" class="form-control is-invalid" id="price"  required> 
  </div>
  <div class="mb-3">
    <label for="body">Описание товара</label>
    <textarea class="form-control is-invalid" name="body" id="body" placeholder="Полное описание товара" required>{!!$obj->body!!}</textarea>
   @error('body')
     <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
     </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="small_body">Короткое описание</label>
    <textarea class="form-control is-invalid" name="small_body" id="small_body" placeholder="Короткое описание" required>{{$obj->small_body}}</textarea>
 
  </div>

  <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" name="showhide" checked class="custom-control-input" id="showhide" required>
    <label class="custom-control-label" for="showhide">Отметить для отображения</label>
    <div class="invalid-feedback">Скрыто</div>
  </div>
 

  <div class="form-group">
    <select class="custom-select" name="category_id" required>
      <option value="">Выберете категорию</option>
	  @foreach($cats as $one)
	   <option value="{{$one->id}}" 
	   {{($one->id==$obj->category_id)?'selected':''}} >{{$one->name}}</option>
	  @endforeach
    </select>
 
  </div>

  <div class="custom-file">
  <div class="row">
    <div class="col-md-4">
	 @if($obj->picture)
	  <img src="{{asset('uploads/'.$obj->user_id.'/s_'.$obj->picture)}}" width="100%" />
	 @endif
	</div>
	<div class="col-md-8">
    <input type="file" name="picture1" class="custom-file-input" id="picture1">
    <label class="custom-file-label" for="picture1">Выберете изображение...</label>
    </div>
 </div>
  </div>
  <div class="form-group">
  <div class="row">
  <div class="col-md-8 offset-md-4">
  <br style="clear:both" />
  <button class="btn btn-primary btn-block" type="submit">Сохранить</button>
  </div>
  </div>
  </div>
</form>
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
