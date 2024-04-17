<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('layout.heade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card border border-danger border-2 shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="<?php echo e(url('images/general/loginPhoto.webp')); ?>" alt="login form" class="img-fluid rounded-end border h-100" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <h3 class="text-danger text-center fw-bolder text-decoration-underline">login</h3>
                                <form method="POST" id="loginForm" action="<?php echo e(route('authentication')); ?>" class="wow fadeInLeft" data-wow-delay="0.1s">
                                    <?php echo csrf_field(); ?>
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fa fa-cubes fa-2x me-3 loginLogo"></i>
                                        <span class="h1 fw-bold mb-0 text-dark">Logo</span>
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label for="">Email:</label>
                                        <div class="input-group">
                                            <input type="text" id="email" class="form-control form-control-lg border  border-dark rounded-0 " placeholder="email or mobile number" name="email" />
                                        </div>
                                        <span class="text-danger erEmail">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label for="">Password:</label>
                                        <div class="input-group">
                                            <input type="password" id="loginPass" class="form-control form-control-lg border  border-dark border-end-0 rounded-0" placeholder="password" name="password" />
                                            <label for="loginPass"><span class="fa fa-eye py-3 px-2 text-center border border-start-0 border-dark rounded-0 togglePassword"></span></label>
                                        </div>
                                        <span class="text-danger erPass">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                    <div class="pt-1 mt-3 mb-2 d-flex justify-content-center">
                                        <input class="btn btn-danger btn-lg btn-block" type="submit" value="Login" name="login" id="loginButton">
                                    </div>
                                    <div class="align-items-center mb-3" style='content: ""; flex: 1; height: 1px; background: #eee;}'>
                                    </div>
                                    <div class="">
                                        <div class="d-flex justify-content-center mb-3">
                                            <a href="/public/auth/google/redirect" type="button" class="btn btn-primary btn-floating mx-1 px-5">
                                                <i class="fab fa-google px-5"></i>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="/public/auth/github/redirect" type="button" class="btn btn-dark btn-floating mx-1 px-5">
                                                <i class="fab fa-github px-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="mb-5 pb-lg-2 loginMessage mt-4 text-center">Don't have an account? <a href="<?php echo e(route('register')); ?>" class="loginLink">Register here</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo e(asset('js/login.js')); ?>"></script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="../js/validation.js"></script><?php /**PATH /home/GALAXYRADIXWEB/nensi.darji/web/justdial/public_html/resources/views/login.blade.php ENDPATH**/ ?>