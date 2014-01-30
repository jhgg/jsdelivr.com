//Bootstrap get project name and insert into modal box
$(document).on("click", ".openUpdateDialog", function () {
     var project = $(this).data('id');
     $(".modal-body #project").val( project );
    $('#update').modal('show');
});

$(document).on('click', '.btn-small', function () {
     window.test = $(this).data('id');
});

$('#shareme').sharrre({
enableTracking: true,
share: {
googlePlus: true,
facebook: true,
twitter: true,
linkedin: true,
delicious: true
},
enableTracking: true,
buttons: {
googlePlus: {size: 'tall'},
facebook: {layout: 'box_count'},
twitter: {count: 'vertical'},
delicious: {size: 'tall'}
},
hover: function(api, options){
$(api.element).find('.buttons').show();
},
hide: function(api, options){
$(api.element).find('.buttons').hide();
}
});


var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

//search
function gogo()
	{
	var file2 = window.location.hash;
	file =  file2.replace(/\#!/g,"");
	if(file){
			document.getElementById('s').value = file;				
		}
		$(".search_input").focus();
		$(".search_input").keyup(function(){ 
		delay(function(){

	var search_input = $('.search_input').val();
	var keyword= encodeURIComponent(search_input); 
	var yt_url='http://www.jsdelivr.com/code/suggest.php?q='+keyword;  
	$.ajax({
		type: "GET",
		url: yt_url,
	
		success: function(response)
	{
		$("#result").html('');
		if(response.length)
		{ 
			$("#result").append(response); 
		}
	}	
 
	}); 
	} , 600 ); 
	}).keyup();
}