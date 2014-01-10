
$(document).ready(function(){
	//$('#blogPostFrom').hide();
/*	$("#signupEmail").focusout(function(){
*/	
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
/*
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
});*/

$(document).on("click","#from-clr",function(){
	$('#blogPostFrom')[0].reset();
	$("#blog_body").text("");
	editor.destroy();
	$('#blogPostFrom').hide();
	window.location.assign(linkOnCancle);
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
$("#sbuscrbeForm").submit(function(event){
	event.preventDefault();
	if($("#getSubscriberEmail").val()!='' && $("#getSubscriberEmail").val()!=null)
	{
		$.post(linkPath+'/users/subscribe',{'ubscribe_email':$("#getSubscriberEmail").val()},function(data){
			$("#getSubscriberEmail").attr('value',"");
			alertify.success("Thank you !");

		});
	}
});

$("#userCreate").submit(function(event){
	if($("#firstname").val()=="" && $("#firstname").val()!==null)
	{
		alertify.error("Enter Your Firstname please");
		event.preventDefault();
	}
	else if($("#lastname").val()=="" && $("#lastname").val()!==null)
	{
		alertify.error("Enter Your Lastname please");
		event.preventDefault();
	}
	else if($("#signupEmail").val()=="" && $("#signupEmail").val()!==null)
	{

		alertify.error("Enter Your Email please");
		event.preventDefault();
	}
	else if($("#signupPassword").val()=="" && $("#signupPassword").val()!==null)
	{
		alertify.error("Enter a password please");
		event.preventDefault();
	}
	else
	{
		/*event.preventDefault();
		$.ajax({
		    url : linkPath+'/users/checkforemail',
		    type: "POST",
		    data : formData,
		    success: function(data, textStatus, jqXHR)
		    {
		        //data - response from server
		    },
		    error: function (jqXHR, textStatus, errorThrown)
		    {
		 
		    }
		});
		/*$.post(linkPath+'/users/checkforemail',{'email':$("#signupEmail").val()},function(data){
		}).success(data);*/
		//alertify.error("error");
		//event.preventDefault();
	}		
});
/*$("#signupEmail").keypress(function(){
	$("#doSignup").attr("disabled","false");
});*/

$(document).on("click",".ImPosting",function(){
	if($(".myPostNote").val()){
		$("#commentByUser").prepend("<div>"+$(".myPostNote").val()+"</div>");
		$.post(linkPath+"/users/comments",{"postbody":$(".myPostNote").val(),"forPostId":$(".myPostNote").attr("data-id")});
		//alertify.success("Thank you !");
	}
	else{
		alertify.error("Nothing to post");
	}
	
});