
<!-- Contents for Header File Begins here -->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<link rel="shortcut icon" href="{{ URL::asset('img/favicon.png')}}"/>
<html class="no-js" lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>openblog</title>
		<meta name="description" content="openblog">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" media="screen">
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}" media="screen">
		<link href="{{ URL::asset('css/bootflat.css')}}" rel="stylesheet" media="screen">
		<link href="{{ URL::asset('css/bootflat-extensions.css')}}" rel="stylesheet" media="screen">
		<link href="{{ URL::asset('css/bootflat-square.css')}}" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="{{ URL::asset('css/alertify.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/alertify.default.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">
		
		
		
		

		  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		  <!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		  <![endif]-->

		
		<!-- To be uncommented in Prduction 
		    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		    -->
		<!-- To be commented in Prduction -->
		<script src="{{ URL::asset('js/vendor/jquery-1.10.1.min.js')}}"></script>
		
		<script src="{{ URL::asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
	</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a href="{{url('/')}}" class='navbar-brand' style="padding:0px;"><img src="{{URL::asset('img/logo.png')}}" style="height:50px; width:200px"/></a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="{{url('/')}}">Home</a></li>
		  
		  @if(Auth::check())
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi {{Auth::user()->firstname}}<b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="#">My Profile</a></li>
			  <li><a href="{{url('blog/allcontent')}}">My Content</a></li>
			  <li><a href="#">Setting</a></li>
			  <li class="divider"></li>
			  <li><a href="{{url('users/logout')}}">Logout</a></li>
			</ul>
		  </li>
		  @else
		  	<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi Guest<b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
			  <li><a href="#" data-toggle="modal" data-target="#signupModal">Signup</a></li>
			</ul>
		  </li>
		  @endif
		</ul>
	  </div><!-- /.navbar-collapse -->
</nav>

	<div id="pop_message" class="container">
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
<div class="col-md-12">
	<div class="col-md-9">
			{{ $content }}
	</div>
	
	<div class="col-md-3">
	<!-- 	<fieldset>
			<legend>Connect</legend> -->
				<div class="social" align="center">
					<a href="{{url('/')}}"><img src="{{URL::asset('img/facebook.png')}}"/></a>
					<a href="{{url('/')}}"><img src="{{URL::asset('img/g+.png')}}"/></a>
					<a href="{{url('/')}}"><img src="{{URL::asset('img/twitter.png')}}"/></a>
					<a href="{{url('/')}}"><img src="{{URL::asset('img/pinterest.png')}}"/></a>
				</div>
				<br/>
				<div class="">					    
					<form action="{{url('users/subscribe')}}" method="post" id="sbuscrbeForm" name="sbuscrbeForm">
						<div class="input-group">
						    <input type="email" class="form-control" id="getSubscriberEmail" placeholder="Enter your email id">
						    <span class="input-group-btn">
						       <button class="btn btn-default" type="submit" id="getSubscriber">Subscribe</button>
						    </span>
						</div><!-- /input-group -->
					</form>
				</div>	
<!-- 		</fieldset>
 -->		<br/>
		<!-- <div class="progress progress-striped" style="height:30px;text-align:center">
		  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%" align="left">
			Categories
		  </div>
		</div> -->
		
	</div>
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

<!--login model-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="loginModalLabel">Login here</h4>
                </div>
                <div class="modal-body">
                	{{ Form::open(array('url'=>'users/signin', 'class'=>'form-horizontal','role'=>'form','id'=>'userLogin')) }}
                     	<div class="form-group">
                            <label for="loginEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6 col-xs-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="rememberMe" name="remember">Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6 forgot-password">
                                <a href="{{url('password/reset')}}" id="forgotPassword">Forgot Password</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Login</button>
          </div> -->
            </div>
            <!-- / loginModal-content -->
        </div>
</div><!-- /.modal -->
<!--End model-->
<!--Signup modal-->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="signupModalLabel">Signup here</h4>
                </div>
                <div class="modal-body" align="left">
                     <form id="userCreate" method="POST" action="{{url('users/create')}}" accept-charset="UTF-8" class="form-horizontal" role="form" id="taskCreate">
                     	<div class="form-group">
                        	<label for="loginEmail" class="col-sm-3 control-label">First Name</label>
                        	<div class="col-sm-8">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="loginEmail" class="col-sm-3 control-label">Last Name</label>
                        	<div class="col-sm-8">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="loginEmail" class="col-sm-3 control-label">Email</label>
                        	<div class="col-sm-8">
                                <input type="email" class="form-control" id="signupEmail" name="email" placeholder="Valid Email id" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="signupPassword" name="password" placeholder="Password" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="doSignup">SignUp</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Login</button>
          </div> -->
            </div>
            <!-- / loginModal-content -->
        </div>
</div><!-- /.modal -->
<!--end modal-->



<!-- External Scripts -->    
    <script src="{{ URL::asset('js/vendor/html5shiv-printshiv.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/html5shiv.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/jquery-ui.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/jquery.windows.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/jquery.nicescroll.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/summernote.min.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/alertify.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>
    <script type="text/javascript">
    	var linkPath="{{URL::to('/')}}";
    	var linkOnCancle="{{URL::to('blog/allcontent')}}";
    	var editor;
		editor=CKEDITOR.replace('blog_body');
    </script>

</body>
</html>
