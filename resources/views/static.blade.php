@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <h2>{{isset($obj->name)?$obj->name:'404'}}</h2> 
<br style="clear:both" />	
	   <div class="col-md-12">   
	    <div class="maintext">
	     {!! isset($obj->body)?$obj->body:'404 pages' !!}
	    </div>
	   </div>
    </div>
</div>
@endsection

