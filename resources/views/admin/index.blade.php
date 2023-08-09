<!DOCTYPE html>
<html lang="en">
@include('layout.heade')
@include('layout.header')
<section class="mt-5 pt-3 admin-dashboard">
    <!-- content -->
    <div class="row">
        @include('admin.sidebar')
        <div class="col-lg-10">
            <div class="container my-5">
                <div class="row p-5">
                    <div class="col-4 ">
                        <div class="card text-dark rounded shadow my-5 py-5">
                            <div class="card-body">
                                <h4 class="display-3 fw-bold text-center text-danger">1</h4>
                                <h5 class="text-center text-danger">Total Services</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card text-dark rounded shadow my-5 py-5">
                            <div class="card-body">
                                <h4 class="display-3 fw-bold text-center text-danger">2</h4>
                                <h5 class="text-center text-danger">Total Service Provider</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card text-dark rounded shadow my-5 py-5">
                            <div class="card-body">
                                <h4 class="display-3 fw-bold text-center text-danger">3</h4>
                                <h5 class="text-center text-danger">Active Service Provider</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layout.footer')