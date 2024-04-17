<!DOCTYPE html>
<html lang="en">
@include('layout.heade')
@include('layout.header')
<section class="pt-3 mt-5 admin-dashboard">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-lg-10">
            <div class="mx-5 px-4">
                <div class="row mb-3">
                    <div class="col-lg-12 lg:ps-5 pt-2 column10">
                        <div class="d-flex justify-content-between  mt-3">
                            <!-- heading -->
                            <div class="py-2 mx-5">
                                <h4 class="modal-title">Provider List</h4>
                            </div>
                            <div class=" py-2 mx-5">
                                <a href="index.php" class="btn btn-outline-danger px-3"><i class="fa fa-arrow-left me-3"></i>BACK</a>
                            </div>
                        </div>
                        <!-- Data Add Part - Form -->
                        <div class="rounded fw-bolder adminServiceForm">
                            <table id="display" class="table table-hover border rounded-3 shadow wow fadeInUp" data-wow-delay="0.1s">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Buisness Name</th>
                                        <th>Services</th>
                                        <th>Address</th>
                                        <th>Contact Details</th>      
                                        <th>Status</th>
                                        <th>Thumbnail</th>
                                        <th>Large Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectData as $key => $item)
                                        @if ($item->bStatus)
                                            <?php $checkbox = 'checked';
                                                $class = "bg-success"; ?>
                                        @else
                                            <?php $checkbox = 'off';
                                                $class = "bg-info"; ?>
                                        @endif
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->sName}}</td>
                                            <td>{{$item->service->sServiceName}}
                                            </td>
                                            <td>{{$item->sAddress}}, {{$item->scity}}, {{$item->nPincode}}
                                            </td>
                                            <td>
                                                Ph: {{$item->nPhoneNumber}}<br/>Email: {{$item->sEmail}}
                                            </td>
                                            <td>
                                                <div class="flex-fill mb-0 ms-4 form-check form-switch">
                                                    <input class=" form-check-input h4 border-dark border-2 stat" name="switch" type="checkbox" id="" {{$checkbox}}>
                                                </div>
                                            </td>
                                            <td><img src="{{asset('images/') . '/' .$item->sSmPic}}" alt="" width="150" height="100"></td>
                                            <td><img src="{{asset('images/') . '/' .$item->sLgPic}}" alt="" width="150" height="100"></td>
                                            <td>
                                                <a href="{{url('providerList/edit')}}/{{$item->nId}}" class="edit me-1"><span class="fa-regular fa-pen-to-square h5 text-dark"></span></a>
                                                <a href="{{url('providerList/delete/')}}/{{$item->nId}}" class="delete"><span class="fa-regular fa-trash-can h5 text-dark"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script src="../../js/provider.js"></script>
@include('layout.footer')