$(document).ready(function(){
	//$('#blogPostFrom').hide();
	
	
});

/*$(document).on("click",".blog-edit",function(event){
	event.preventDefault();
	$('#input_content_title').val(($("#content_title").text()));
	$('#blog_body').text(($("#content_body").text()));
	$('#input_content_tags').val(($("#content_tags").text()));
	
	$("#old_body").hide();
	$('#blogPostFrom').attr("data-operation","edit");
	$('#blogPostFrom').show();
});

$(document).on("click",".blog-new",function(event){
	//event.preventDefault();
	editor=CKEDITOR.replace('blog_body');
	$('#blogPostFrom')[0].reset();
	$('#blogPostFrom').attr("data-id",0);
	$("#old_body").hide();
	$('#blogPostFrom').attr("data-operation","new");
	$('#blogPostFrom').show();
});*/

$(document).on("click","#frm-save",function(event){
	//event.preventDefault();
	//console.log($("#input_content_title").val());
	//console.log($("#blog_body").val());
	//console.log($("#tags").val());
	$.post(linkPath+"/blog/update/"+$('#blogPostFrom').attr("data-id"),{'title':$("#blog_title").val(),'body':CKEDITOR.instances['blog_body'].getData(),'tags':$("#tags").val()},function(){
		//alert("ok");		
	});
	//$('#blogPostFrom').trigger('reset');
	editor.destroy();
});

$(document).on("click","#from-clr",function(){
	$('#blogPostFrom')[0].reset();
	$("#blog_body").text("");
	editor.destroy();
	$("#old_body").show();
	$('#blogPostFrom').hide();
});
$(document).on("click","#from-view",function(){
	$("#view_content_id").html($("#blogPostFrom").attr("data-id"));
	$("#view_content_title").html($("#input_content_title").val());
	$("#view_content_body").html($("#blog_body").text());
	$("#view_content_tags").html($("#input_content_tags").val());
	$("#view_content_uid").html($("#content_uid").text());
	$("#view_content_created_at").html($("#content_created_at").text());
	$("#view_content_updated_at").html($("#content_updated_at").text());
});
$(document).on("click",".resetPreviewModel",function(){
	$("#view_content_id").html("");
	$("#view_content_title").html("");
	$("#view_content_body").html("");
	$("#view_content_tags").html("");
	$("#view_content_uid").html("");
	$("#view_content_created_at").html("");
	$("#view_content_updated_at").html("");
});
