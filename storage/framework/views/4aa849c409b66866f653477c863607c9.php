<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('layout.heade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-1">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?php echo e(asset('images/slider/hospitalBg.jpeg')); ?>" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Hospital Servicing //</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Doctor Service Center</h1>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="img-fluid rounded-3" src="img/slider/slidshow.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?php echo e(asset('images/carousel-bg-2.jpg')); ?>" alt="Image">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Car Servicing //</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Car Wash Service Center</h1>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="img-fluid" src="img/carousel-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Booking Start -->
<div class="container-fluid bg-secondary booking wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5">
                <div class="pt-5">
                    <h1 class="text-white mb-4">Certified and Award Winning Service Provider System</h1>
                    <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-danger h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Request For a Service</h1>
                    <form method="POST" action="<?php echo e(route('contactDetail')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" value="" placeholder="Your Name" style="height: 55px;" name="name">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;" value="">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" name="text" placeholder="Special Request" rows="5"></textarea>
                            </div>
                            <div class="col-12">
                                <input class="btn btn-secondary w-100 py-3" type="submit" value="Submit" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php if(Session::has('success')): ?>
    <script>
        alertMessage("<?php echo e(Session::get('success')); ?>" );
    </script>
<?php endif; ?>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/GALAXYRADIXWEB/nensi.darji/web/justdial/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>