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
                            <form method="POST" enctype="multipart/form-data" id="addProviderForm" action="{{$url}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Business Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="" placeholder="Name" class="form-control border border-dark border-1" value="{{$data->sName ?? ''}}">
                                        <span class="text-danger">
                                            @error('name')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="" class='h4'>Email </label>
                                        <input type="email" name="email" id="" class="form-control border border-dark border-1" value="{{$data->sEmail ?? ''}}" placeholder="Email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Phone Number<span class="text-danger">*</span></label>
                                        <input type="tel" name="phoneNumber" id="" placeholder="Phone Number" class="form-control border border-dark border-1" value="{{$data->nPhoneNumber ?? ''}}">
                                        <span class="text-danger">
                                            @error('phoneNumber')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 form-group">
                                        @if (isset($data->bStatus))
                                            <?php $checked = ($data->bStatus) ? 'checked' : ''; ?>
                                        @endif
                                        <span class="me-3">Status: </span>
                                        <div class="flex-fill mb-0 form-check form-switch">
                                            <input class="form-check-input h2 ms-1" name="switch" type="checkbox" id="flexSwitchCheckChecked" {{$checked ?? 'checked'}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Address <span class="text-danger">*</span></label>
                                        <textarea name="address" placeholder="Address" id="" class="form-control border border-dark border-1" cols="30" rows="5">{{$data->sAddress ?? ''}}</textarea>
                                        <span class="text-danger">
                                            @error('address')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="star" class='h4'>Services <span class="text-danger">*</span></label><br>
                                        <select id="" class="form-select border border-dark border-1 selectpicker" name="service">
                                            @foreach ($selectData as $item)
                                                @if (isset($data->nServiceId))
                                                    <?php $selected = ($data->nServiceId == $item->nId) ? 'selected' : ''; ?>
                                                @else
                                                    <?php $selected = ''; ?>
                                                @endif
                                                <option value="{{$item->nId}}" {{$selected ?? ''}}>{{$item->sServiceName}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('service')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="" placeholder="city" class="form-control border border-dark border-1" value="{{$data->scity ?? ''}}">
                                        <span class="text-danger">
                                            @error('city')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Pincode <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="" placeholder="Pincode" class="form-control border border-dark border-1" value="{{$data->nPincode ?? ''}}">
                                        <span class="text-danger">
                                            @error('pincode')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Thumbnail Photo <span class="text-danger">*</span></label><br>
                                        <input type="file" name="smPic" id="" class="form-control border border-dark border-1">
                                        @if (isset($data->sSmPic))
                                            <img src="{{asset('images/') . '/' . $data->sSmPic}}" alt="" width="200" height="150" class="mt-3">
                                        @endif
                                        <span class="text-danger">
                                            @error('smPic')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="titl" class='h4'>Large Photo <span class="text-danger">*</span></label><br>
                                        <input type="file" name="lgPic" id="" class="form-control border border-dark border-1" value="{{asset('images/hospital.jpg')}}">
                                        @if (isset($data->sLgPic))
                                            <img src="{{asset('images/') . '/' . $data->sLgPic}}" alt="" width="200" height="150" class="mt-3">
                                        @endif
                                        <span class="text-danger">
                                            @error('lgPic')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Save Changes" class="btn btn-outline-danger addHotelForm" name="saveProvider">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/main.js')}}"></script>
@if (Session::has('success'))
    <script>
        alertMessage("{{ Session::get('success')}}" );
    </script>
@endif
<script src="../../js/validation.js"></script>
@include('layout.footer')
