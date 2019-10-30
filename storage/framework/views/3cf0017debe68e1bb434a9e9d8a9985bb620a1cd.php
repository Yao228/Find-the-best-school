<?php $__env->startSection('title'); ?>
Écoles Togo | Connexion
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<section class="padding-bottom-50 padding-top-50">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            

        <!--Tabs -->
         <!-- Section -->
         <div class="add-listing-section">

        <!-- Headline -->
        <div class="add-listing-headline">
            <h3><i class="sl sl-icon-login"></i>Connexion</h3>
        </div>
        <div class="notification notice large closeable margin-bottom-55">
            <h4>Avez-vous un compte ? 🙂</h4>
            <p>Avant d'ajouter une école vous devez vous connecter.</p> 
            <p>Si vous n'avez pas de compte, créez pour poursuivre l'ajout de votre école.</p>
            <a class="close" href="#"></a>
        </div>

        <div class="sign-in-form style-1">

            <ul class="tabs-nav">
                <li class=""><a href="#tab1"><?php echo e(__('Se connecter')); ?></a></li>
                <li><a href="#tab2"><?php echo e(__('Créer un compte')); ?></a></li>
            </ul>

            <div class="tabs-container alt">

                <!-- Login -->
                <div class="tab-content" id="tab1" style="display: none;">
                     
                     <div class="form-row text-center">
                        <a href="<?php echo e(url('/redirect/google')); ?>" class="button google"> <i class="fa fa-google"></i> Connexion Google</a> 
                        <a href="<?php echo e(url('/redirect/facebook')); ?>" class="button login-facebook"><i class="fa fa-facebook-square"></i>Connexion Facebook</a>								
                        <hr>
                    </div>
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
                    <div class="form-row text-center">
                        <a href="<?php echo e(url('/redirect/google')); ?>" class="button google"> <i class="fa fa-google"></i> Connexion Google</a> 
                        <a href="<?php echo e(url('/redirect/facebook')); ?>" class="button login-facebook"><i class="fa fa-facebook-square"></i>Connexion Facebook</a>															
                        <hr>
                    </div>
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
    <!-- Sign In Popup / End -->
        </div>
        
        </div>

    </div>
</div>
</section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shuletogo\resources\views/auth/login.blade.php ENDPATH**/ ?>