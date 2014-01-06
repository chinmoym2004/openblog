<div class="row">
  <div class="col-md-6 login">
	{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	   <h3 class="form-signin-heading">Login here</h3><br/>
	 
	   {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address','required','value'=>'')) }}<br/>
	   {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','required','value'=>'')) }}<br/>
	 
	    <div class="control-group">
			<div class="controls" style="padding-left:20px;">
				<label class="checkbox">
					 {{Form::checkbox('remember', 'remember', true)}}<span class="metro-checkbox">Remember me!</span>
				</label>
				<div>{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}&nbsp;&nbsp;&nbsp;{{ HTML::link('password/reset', 'Forgot Password?') }}</div>
			</div>
		</div>
	{{ Form::close() }}
  </div>
</div>

