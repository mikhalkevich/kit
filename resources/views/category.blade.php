@extends('layouts.app')
@section('scripts')
 @parent
 <script src="{{asset('js/modal.js')}}"></script>
@endsection 
@section('styles')
 @parent
 <link href="{{asset('css/modal.css')}}" rel="stylesheet" />
@endsection 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$obj->name}}</div>
                <div class="card-body">
<div class="row">
 @foreach($products as $prod)
  <div class="col-md-4">
<div class="card">
  <div class="card-header">
    {{$prod->name}}
  </div>
  <div class="card-body">
    <div class="card-title">
	 @if($prod->picture)
	  <img src="{{asset('uploads/'.$prod->user_id.'/s_'.$prod->picture)}}" width="100%" />
	 @else
 	 <img src="{{asset('uploads/no_photo.jpg)')}}" width="100%" />
	 @endif
	</div>
    <div class="card-text">{{$prod->small_body}}</div>
    <div class="card-text">Цена {{$prod->price}} y.e.</div>
<br style="clear:both" />	
    <a href="#" data-id="{{$prod->id}}" class="btn btn-primary btn-sm my_modal">Открыть</a>
    <a href="#" data-id="{{$prod->id}}" class="btn btn-primary btn-sm go">Перейти</a>
	<a href="#html" data-id="{{$prod->id}}" id="good-{{$prod->id}}-{{$prod->price}}" class="btn btn-primary btn-sm buy addCart"> <span class="glyphicon glyphicon-list"></span> Add to cart </a> 
  </div>
</div>
  </div>
 @endforeach
</div>
 <p>
  {!!$products->links()!!}
 </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
