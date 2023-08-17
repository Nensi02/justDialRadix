<!DOCTYPE html>
<html lang="en">
@include('layout.heade')
@include('layout.header')
<section class="mt-5 pt-3 admin-dashboard">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-lg-10">
            <div class="container ">
                <div class="row mb-3">
                    <div class="col-lg-12 lg:ps-5 pt-2 column10">
                        <!-- Success Message -->
                        {{-- <h1 class=" text-decoration-underline text-center mess">Add Provider</h1> --}}
                        <div class="d-flex justify-content-between  mt-3">
                            <!-- heading -->
                            <div class="h1 py-2 mx-5">
                                <h3 class="modal-title">Add Provider</h3>
                            </div>
                            <div class="py-2 mx-5">
                                <a href="" class="btn btn-outline-danger px-3"><i class="fa fa-arrow-left me-3"></i>BACK</a>
                            </div>
                        </div>
                        <!-- Data Add Part - Form -->
                        <div class="p-5 bg-white shadow-lg bg-opacity-75 rounded fw-bolder border border-2 border-danger adminServiceForm wow fadeInUp" data-wow-delay="0.1s">
                            {{-- <h3 class="text-center text-decoration-underline mb-5 text-danger">Service Provider</h3> --}}
                            <form method="POST" enctype="multipart/form-data" id="addProviderForm" action="{{$url}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Business Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="" placeholder="Name" class="form-control border border-dark border-1" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="" class='h4'>Email </label>
                                        <input type="email" name="email" id="" class="form-control border border-dark border-1" value="" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Phone Number<span class="text-danger">*</span></label>
                                        <input type="tel" name="phoneNumber" id="" placeholder="Phone Number" class="form-control border border-dark border-1" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <span class="me-3">Status: </span>
                                        <div class="flex-fill mb-0 form-check form-switch ">
                                            <input class="form-check-input h2 ms-1" name="switch" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Address <span class="text-danger">*</span></label>
                                        <textarea name="address" placeholder="Address" id="" class="form-control border border-dark border-1" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="star" class='h4'>Services <span class="text-danger">*</span></label><br>
                                        <select id="" class="form-select border border-dark border-1 selectpicker">
                                            <option value="" selected>Select</option>
                                            @foreach ($selectData as $item)
                                                <option value="{{$item->nId}}">{{$item->sServiceName}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="" placeholder="city" class="form-control border border-dark border-1" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Pincode <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="" placeholder="Pincode" class="form-control border border-dark border-1" value="">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Thumbnail Photo <span class="text-danger">*</span></label><br>
                                        <input type="file" name="smPic" id="" class="form-control border border-dark border-1">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Large Photo <span class="text-danger">*</span></label><br>
                                        <input type="file" name="lgPic" id="" class="form-control border border-dark border-1">
                                        {{-- <span class="text-danger"><?php echo $erLgPic; ?></span> --}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Save Changes" class="btn btn-outline-danger addHotelForm" name="saveProvider">
                                    {{-- <input type="submit" value="Save And Back" class="btn btn-danger addHotelForm" name="save&back"> --}}
                                    {{-- <input type="reset" value="Reset" class="btn btn-dark"> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    <script>
        $(document).ready(function () {
            $('.selectpicker').selectpicker();
        });
</script>
</script>
<script src="../../js/validation.js"></script>
@include('layout.footer')
