<!DOCTYPE html>
<html lang="en">
@include('layout.heade');
<section class="">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card border border-danger border-2 shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{url('images/general/loginPhoto.webp')}}" alt="login form" class="img-fluid rounded-end border h-100" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <h3 class="text-danger text-center fw-bolder text-decoration-underline">login</h3>
                                <form method="POST" id="loginForm" action="{{route('authentication')}}" class="wow fadeInLeft" data-wow-delay="0.1s">
                                    @csrf
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
                                            @error('email')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label for="">Password:</label>
                                        <div class="input-group">
                                            <input type="password" id="loginPass" class="form-control form-control-lg border  border-dark border-end-0 rounded-0" placeholder="password" name="password" />
                                            <label for="loginPass"><span class="fa fa-eye py-3 px-2 text-center border border-start-0 border-dark rounded-0 togglePassword"></span></label>
                                        </div>
                                        <span class="text-danger erPass">
                                            @error('password')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <input class="btn btn-danger btn-lg btn-block" type="submit" value="Login" name="login" id="loginButton">
                                    </div>
                                    <a class="h6 text-muted" href="{{route('login')}}">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2 loginMessage">Don't have an account? <a href="{{route('register')}}" class="loginLink">Register here</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../js/validation.js"></script>
{{-- @include('layout.footer'); --}}