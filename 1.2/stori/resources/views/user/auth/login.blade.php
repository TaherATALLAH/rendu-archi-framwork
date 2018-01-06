@extends('master')

@section('container')
<div class="w3l_banner_nav_right">
<div class="w3_login">
    <h3>Sign In & Sign Up</h3>
        <div class="w3_login_module">        
            <div class="col-md-8 col-md-offset-2">
            <div class="module form-module">
                 <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Clicker ici</div>
				  </div>
                <div class="form" >
                    <h2>CONNECTEZ-VOUS</h2>
                    <form  role="form" method="POST" action="{{ url('/user/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            
                                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            
                                <input id="password" type="password" placeholder="Password"  name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        
                                <div >
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            

                                <input type="submit" value="SE CONNECTER">
<!--
                                <a class="btn btn-link" href="{{ url('/user/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                                -->
                         
                    </form>
                    
                </div>
                <div class="form">
                <h2>INSCRIVEZ-VOUS</h2>
                          <form  role="form" method="POST" action="{{ url('/user/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            
                            <input id="name" type="text" placeholder="Nom" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                            
                            <input id="prenom" type="text" placeholder="Prenom" name="prenom" value="{{ old('prenom') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                           
                            <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                           
                            <input id="password" type="password" placeholder="Mot de passe" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            

                            
                            <input id="password-confirm" type="password" placeholder="Confimer mot de passe" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <input type="submit" value="S'INSCRIRE">
                    </form>
                </div>
                
                <div class="cta"><a href="{{ url('/user/password/reset') }}">Forgot your password?</a></div>
            </div>
                
        </div>
            <script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
    </div>
</div>
</div>
@endsection
