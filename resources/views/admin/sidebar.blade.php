<div class="pt-lg-5 py-5 col-lg-2 bg-danger navbar-expand-lg navbar-dark">
    <div class="">
        <button class="navbar-toggler mb-2" data-bs-toggle="collapse" data-bs-target="#data">
            <span class="fa fa-home"></span></button>
    </div>
    <ul class="collapse list-unstyled show ">
        <li class="mb-1">
            <a class="btn text-white rounded-0 bg-opacity-75 py-3  fw-bolder w-100" href="{{route('addServices')}}">
                Add Services
            </a>
        </li>
        <li class="mb-1">
            <a class="  btn text-white rounded-0 bg-opacity-75 py-3  fw-bolder w-100" href="{{route('addProvider')}}">
                Add Service Provider
            </a>
        </li>
        <li class="mb-1">
            <a class="<?php echo ($_SERVER['PHP_SELF'] ==  "/justDial/view/admin/serviceList.php" ? "text-decoration-underline" : ""); ?> btn text-white rounded-0 bg-opacity-75 py-3  fw-bolder w-100" href="{{route('serviceList')}}">
                List of Services
            </a>
        </li>
        <li class="mb-1">
            <a class="<?php echo ($_SERVER['PHP_SELF'] == "/justDial/view/admin/providerList.php" ? "text-decoration-underline" : ""); ?> btn text-white rounded-0 bg-opacity-75 py-3  fw-bolder w-100" href="/view/admin/providerList.php">
                List of Services Provider
            </a>
        </li>
    </ul>
</div>