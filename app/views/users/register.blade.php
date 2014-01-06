<div class="row">
  <div class="col-md-6">
    <form method="POST" action="{{url('users/signin')}}" accept-charset="UTF-8" class="form-signin" role="form" id="userCreate">	{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	   <h2 class="form-signin-heading">Signup</h2>
	 	{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name','required','value'=>'','id'=>'firstname')) }}<br/>
	 	{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name','required','value'=>'','id'=>'lastname')) }}<br/>
	   	{{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address','required','value'=>'','id'=>'emailid')) }}<br/>
	   	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','required','value'=>'','id'=>'password')) }}<br/>
	 
	    <div class="control-group">
			<div class="controls">
				<div>{{ Form::submit('Signup', array('class'=>'btn btn-primary'))}}&nbsp;&nbsp;&nbsp;<a href={{url('users/login', 'Login') }}</div>
			</div>
		</div>
	{{ Form::close() }}
  </div>
</div>