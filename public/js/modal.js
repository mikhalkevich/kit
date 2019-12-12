$(function(){
 var fx = {
  "initModal" : function(){
    if($('.modal-window').length == 0){
	 $('<div>').attr('id','jquery-overlay').fadeIn('slow').click(function(){
	  $('.modal-window').remove();
	  $('#jquery-overlay').remove();
	 }).appendTo('body');
	 return $('<div>').addClass('modal-window').appendTo('body');
	}else{
	 return $('.modal-window');
	}
  }
 }

 $('.my_modal').click(function(){
   var id = $(this).attr('data-id');
   var modal = fx.initModal();
   $.ajax({
    type: 'post',
	url: '/ajax/product',
	data: 'id=' + id,
	success: function(data){
	 modal.append(data);
	},
	error: function(msg){
	 console.log(msg);
	}
   });
   $('<a>').attr('href','#')
		   .addClass('modal-close-btn')
		   .html('&times;')
		   .click(function(){
		     $('#jquery-overlay').fadeOut("slow", function(){
				$(this).remove();
			 });
			 modal.remove();
		   }).appendTo(modal);
 });
});