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
                <div class="card-header">Форма добавления товара</div>

                <div class="card-body">
<form class="was-validated" action="{{asset('home')}}" method="post" enctype="multipart/form-data">
  {!!csrf_field()!!}
  <div class="mb-3">
    <label for="name">Название товара</label>
    <input type="text" name="name" class="form-control is-invalid" id="name">
   @error('name')
     <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
     </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="price">Цена</label>
    <input type="text" name="price" class="form-control is-invalid" id="price"  required> 
  </div>
  <div class="mb-3">
    <label for="body">Описание товара</label>
    <textarea class="form-control is-invalid" name="body" id="body" placeholder="Полное описание товара" required></textarea>
   @error('body')
     <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
     </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="small_body">Короткое описание</label>
    <textarea class="form-control is-invalid" name="small_body" id="small_body" placeholder="Короткое описание" required></textarea>
 
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
	   <option value="{{$one->id}}">{{$one->name}}</option>
	  @endforeach
    </select>
 
  </div>

  <div class="custom-file">
    <input type="file" name="picture1" class="custom-file-input" id="picture1">
    <label class="custom-file-label" for="picture1">Выберете изображение...</label>
 
  </div>
  <div class="form-group">
  <br />
  <button class="btn btn-primary" type="submit">Сохранить</button>
  </div>
</form>
<table class="table table-bordered table-striped" width="100%">
<tr>
 <th width="200px">Изображение</th>
 <th>Название</th>
 <th>Описание</th>
 <th>Категория</th>
 <th>Действия</th>
</tr>
@foreach($products as $one)
<tr>
 <td>
 @if($one->picture)
  <img src="{{asset('uploads/'.$one->user_id.'/s_'.$one->picture)}}" width="100%">
 @endif
 </td>
 <td>{{$one->name}}</td>
 <td>{{$one->small_body}}</td>
 <td>{{(isset($one->catalogs->name))?$one->catalogs->name:''}}</td>
 <td>
  <a href="{{asset('home/edit/'.$one->id)}}" class="btn btn-block btn-success">Редактировать</a>
    <a href="{{asset('home/delete/'.$one->id)}}" class="btn btn-block btn-default">Удалить</a>
 </td>
</tr>
@endforeach
</table>
{!!$products->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
