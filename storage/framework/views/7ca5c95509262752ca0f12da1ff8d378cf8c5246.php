<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

<!-- Basic Page Needs
================================================== -->
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>" />


<!-- CSS
================================================== -->
<!-- Custom styles for this template-->
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/main-color.css')); ?>" id="colors">
<?php echo $__env->yieldContent('css'); ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5d80c8d9c22bdd393bb63e95/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
</script>
	<!--End of Tawk.to Script-->
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="<?php echo e(route('frontend')); ?>"><img src="<?php echo e(asset('images/logo.png')); ?>" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
                    	<li><a class="<?php echo e(request()->is('/*') ? 'current' : null); ?>" href="<?php echo e(route('frontend')); ?>">Accueil</a></li>
                        <li><a class="<?php echo e(request()->is('liste-ecoles*') ? 'current' : null); ?>" href="<?php echo e(route('liste-ecoles')); ?>">Les écoles</a></li>
                        <li><a class="<?php echo e(request()->is('a-propos*') ? 'current' : null); ?>" href="<?php echo e(route('a-propos')); ?>">A propos</a></li>
                        <li><a class="<?php echo e(request()->is('contact*') ? 'current' : null); ?>" href="<?php echo e(route('contact')); ?>">Contact</a></li>						
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<?php if(Route::has('login')): ?>
			<div class="right-side">
				<div class="header-widget">
					<?php if(auth()->guard()->check()): ?>
					<div class="user-menu">
						<div class="user-name"><span><img src="<?php echo e(Gravatar::src(Auth::user()->email)); ?>" alt=""></span><?php echo e(Auth::user()->name); ?></div>
							<ul>
								<li><a href="<?php echo e(route('dashboard')); ?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>				
								<li>
									<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									<i class="sl sl-icon-power"></i> Deconnexion
									</a>
									<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
										<?php echo csrf_field(); ?>
									</form>
								</li>
							</ul>
					</div>
					<a href="<?php echo e(route('addschool')); ?>" class="button border with-icon">Ajoutez votre école <i class="sl sl-icon-plus"></i></a>
					<?php else: ?>
						<a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i>Connexion</a>
						<a href="<?php echo e(route('addschool')); ?>" class="button border with-icon">Ajoutez votre école <i class="sl sl-icon-plus"></i></a>
					<?php endif; ?>
				</div>				
			</div>
			<?php endif; ?>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Connexion</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1"><?php echo e(__('Se connecter')); ?></a></li>
						<li><a href="#tab2"><?php echo e(__('Créer un compte')); ?></a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">
							
							<div class="text-center">
								<p class="social-ou">Connectez-vous avec</p>
								<a href="<?php echo e(url('/redirect/google')); ?>" class="button google"> <i class="fa fa-google"></i>  Google</a> 
								<a href="<?php echo e(url('/redirect/facebook')); ?>" class="button login-facebook"><i class="fa fa-facebook-square"></i> Facebook</a>								
							</div>
							<hr>
							<form action="<?php echo e(route('login')); ?>" method="POST" class="login">
								<?php echo csrf_field(); ?>
								<p class="form-row form-row-wide">
									<label for="username"><?php echo e(__('Votre adresse mail')); ?>

										<i class="im im-icon-Male"></i>
										<input type="text" class="input-text <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" id="username" value="<?php echo e(old('email')); ?>" />
										<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
										<span class="invalid-feedback" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
									<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="password"><?php echo e(__('Mot de passe :')); ?>

										<i class="im im-icon-Lock-2"></i>
										<input class="input-text  <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" name="password" required autocomplete="current-password" id="password"/>
										<?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
										<span class="invalid-feedback" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
										<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
									</label>
									<?php if(Route::has('password.request')): ?>
									<span class="lost_password">
										<a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Mot de passe oublié ?')); ?></a>
									</span>
                               		<?php endif; ?>	
								</p>

								<div class="form-row">
									<button class="button" type="submit"><?php echo e(__('Se connecter')); ?></button>
									<div class="checkboxes margin-top-10">
										<input id="remember-me" type="checkbox" name="check">
										<label for="remember-me"><?php echo e(__('Se souvenir de moi')); ?></label>										
									</div>
								</div>
								
							</form>
						</div>

						<!-- Register -->
						<div class="tab-content" id="tab2" style="display: none;">
							
							<div class="text-center">
								<p class="social-ou">Inscrivez-vous avec</p>
								<a href="<?php echo e(url('/redirect/google')); ?>" class="button google"> <i class="fa fa-google"></i>  Google</a> 
								<a href="<?php echo e(url('/redirect/facebook')); ?>" class="button login-facebook"><i class="fa fa-facebook-square"></i> Facebook</a>								
							</div>
							<hr>
							<form action="<?php echo e(route('register')); ?>" method="POST" class="register">
								<?php echo csrf_field(); ?>
								
							<p class="form-row form-row-wide">
								<label for="username2"><?php echo e(__('Votre nom complet :')); ?>

									<i class="im im-icon-Male"></i>
									<input type="text" class="input-text <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus />
								</label>
								<?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($message); ?></strong>
								</span>
								<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
							</p>
								
							<p class="form-row form-row-wide">
								<label for="email2"><?php echo e(__('Adresse mail :')); ?>

									<i class="im im-icon-Mail"></i>
									<input type="text" class="input-text <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" id="email" value="<?php echo e(old('email')); ?>" required autocomplete="email"/>
								</label>
								<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
							</p>

							<p class="form-row form-row-wide">
								<label for="password1"><?php echo e(__('Mot de passe')); ?>

									<i class="im im-icon-Lock-2"></i>
									<input class="input-text <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" name="password" id="password" required autocomplete="new-password"/>
								</label>
								<?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
							</p>

							<p class="form-row form-row-wide">
								<label for="password2"><?php echo e(__('Confirmez votre mot de passe')); ?>

									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password_confirmation" id="password-confirmation" required autocomplete="new-password"/>
								</label>
							</p>

							<button type="submit" class="button">
								<?php echo e(__('S\'enrégistrer')); ?>

							</button>
							</form>
						</div>

					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<?php echo $__env->yieldContent('content'); ?>


<!-- Footer
================================================== -->
<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<img class="footer-logo" src="<?php echo e(asset('images/logo.png')); ?>" alt="">
				<br><br>
				<p>
						Ecoles.tg est développé par une équipe de développeurs de solutions webs (applications, logiciels, site web) dédiées à l’éducation. Notre mission est de dématérialiser le système des gestions des établissements.
				</p>
				<h4>Contactez Nous</h4>
				<div class="text-widget">
					<span>259 Rue Séklé, Agbalépédogan, Lomé Togo</span> <br>
					N° de téléphone : <span>(+228) 91 08 91 48 </span><br>
					E-Mail :<span> <a href="#">contact@ecoles.tg</a> </span><br>
				</div>
				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="https://www.facebook.com/ecolestg/" target="_blank"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="https://twitter.com/ecoles_tg" target="_blank"><i class="icon-twitter"></i></a></li>
					<li><a class="linkedin" href="https://www.linkedin.com/company/ecolestg" target="_blank"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Niveaux d'étude</h4>
				<ul class="footer-links">
					<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="<?php echo e(route('types', $type)); ?>"><?php echo e($type->name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-4 col-sm-12">
				<h4>Suivez nous sur Facebook</h4>
				<p>
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fecolestg%2F&tabs=timeline&width=340&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=530399087316049" width="340" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</p>
			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2019 Écoles Togo. Tous droits réservés.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->



 <!-- Bootstrap core JavaScript-->
 
  
 <!-- Scripts
================================================== -->


<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-migrate-3.1.0.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/mmenu.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/chosen.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/rangeslider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/magnific-popup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/counterup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/tooltips.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/custom.js')); ?>"></script>


<script>
	function flashy(message, link) {
		var template = $($("#flashy-template").html());
		$(".flashy").remove();
		template.find(".flashy__body").html(message).attr("href", link || "#").end()
		 .appendTo("body").hide().fadeIn(300).delay(2800).animate({
			marginRight: "-100%"
		}, 300, "swing", function() {
			$(this).remove();
		});
	}
  </script>
  
  <?php if(Session::has('flashy_notification.message')): ?>
  <script id="flashy-template" type="text/template">
	<div class="flashy flashy--<?php echo e(Session::get('flashy_notification.type')); ?>">
		<a href="#" class="flashy__body" target="_blank"></a>
	</div>
  </script>
  
  <script>
	flashy("<?php echo e(Session::get('flashy_notification.message')); ?>", "<?php echo e(Session::get('flashy_notification.link')); ?>");
  </script>
  <?php endif; ?>
  
  
  
  
	<?php echo $__env->yieldContent('scripts'); ?>
	<?php echo $__env->make('flashy::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\laragon\www\shuletogo\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>