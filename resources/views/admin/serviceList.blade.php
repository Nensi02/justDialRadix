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
                        <!-- Success Message -->
                        {{-- <h1 class=" text-decoration-underline text-center mess">sc</h1> --}}
                        <div class="d-flex justify-content-between  mt-3">
                            <!-- heading -->
                            <div class="h1 py-2 mx-5">
                                {{-- <h1 class="modal-title"><?php echo $heading; ?></h1> --}}
                            </div>
                            <div class=" py-2 mx-5">
                                <a href="index.php" class="btn btn-outline-danger px-3"><i class="fa fa-arrow-left me-3"></i>BACK</a>
                            </div>
                        </div>
                        <!-- Data Add Part - Form -->
                        <div class=" rounded fw-bolder adminServiceForm">
                            <table id="display" class="table table-hover border rounded-3 shadow wow fadeInUp" data-wow-delay="0.1s">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Service</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceData as $item)
                                        <tr>
                                            <td>{{$item->nId}}</td>
                                            <td>{{$item->sServiceName}}</td>
                                            <td>{{$item->sDescription}}</td>
                                            <td>
                                                <a href="{{url('serviceList/edit')}}/{{$item->nId}}" class="edit me-1"><span class="fa-regular fa-pen-to-square h5 text-dark"></span></a>
                                                {{-- <input type="submit" class="btn btn-outline-primary deleteValue" id="{{$item->nId}}" name="delete" hidden> --}}
                                                <a href="{{url('serviceList/delete/')}}/{{$item->nId}}" class="delete"><span class="fa-regular fa-trash-can h5 text-dark"></span></a>
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
<script src="../../js/services.js"></script>
@include('layout.footer')