<h2>{{$obj->name}}</h2>
@if($obj->picture)
 <img src="{{asset('uploads/'.$obj->user_id.'/'.$obj->picture)}}" width="100%" class="my_pic" />
@else
 <img src="{{asset('uploads/no_photo.png')}}" />
@endif
<div>
<br />
<a href="{{asset('category/'.$obj->category_id)}}" class="f_right">{{$obj->catalogs->name}}</a>
<p>Цена <b>{{$obj->price}}</b> y.e <a href="#">Купить</a></p>
<p><em>{{$obj->samll_body}}</em></p>
 {!!$obj->body!!}
</div>