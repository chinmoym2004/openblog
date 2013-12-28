<!-- Contents for Header File Begins here -->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>openblog</title>
		<meta name="description" content="openblog">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/summernote.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">


		
		<!-- To be uncommented in Prduction 
		    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		    -->
		<!-- To be commented in Prduction -->
		<script src="{{ URL::asset('js/vendor/jquery-1.10.1.min.js')}}"></script>
		
		<script src="{{ URL::asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
	</head>
<body>
<div id="pop_message">
@if(Auth::check()&&Auth::user()->admin==1)
	<div>{{ HTML::link('/admin', 'View Admin panel') }}</div>
@endif
@if(Session::has('message'))
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('message') }}.
            </div>
@endif
</div>
<div class="container">
{{ $content }}
</div>



<!-- Preview Modal -->
<div class="modal fade" id="myPostPreview" tabindex="-1" role="dialog" aria-labelledby="myPostPreviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="resetPreviewModel">&times;</button>
        <h4 class="modal-title" id="myPostPreviewLabel">Post Preview</h4>
      </div>
      <div class="modal-body">
        <div id="view_content_id"></div>
		<div id="view_content_title"></div>
		<div id="view_content_body"></div>
		<div id="view_content_tags"></div>
		<div id="view_content_uid"></div>
		<div id="view_content_created_at"></div>
		<div id="view_content_updated_at"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" class="resetPreviewModel">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- External Scripts -->    
    <script src="{{ URL::asset('js/vendor/html5shiv-printshiv.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/html5shiv.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/jquery-ui.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/jquery.windows.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/jquery.nicescroll.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/summernote.min.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>

</body>
</html>
