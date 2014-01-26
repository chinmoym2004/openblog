<div class="row">
<section class="panel">
    <header class="panel-heading font-bold">Login here</header>
	<div class="panel-body">
	{{ Form::open(array('url'=>'users/signin', 'class'=>'bs-example form-horizontal','role'=>'form','id'=>'userLogin')) }}
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
	                                <a href="{{url('password/reset')}}" id="forgotPassword">Forgot Password?</a>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-sm-offset-2 col-sm-10">
	                                <button type="submit" class="btn btn-primary">Sign in</button>
	                            </div>
	                        </div>
	                    </form>
	</div>
</section>
</div>