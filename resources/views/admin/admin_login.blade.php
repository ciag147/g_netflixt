<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên</title>
    @include('admin.components.head')
</head>
<body>
<!--  Body Wrapper -->
<section class="page-wrapper" id="main-wrapper" data-layout="vertical"
     data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">

        <div class="d-flex align-items-center justify-content-center w-100">

            <div class="row justify-content-center w-100">

                <div class="col-md-8 col-lg-6 col-xxl-3">

                    <div class="card mb-0">

                        <div class="card-body">

                            <a href="{{ url('admin') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('img/logo.png') }}" width="160" alt=""/>
                            </a>

                            <h4 class="text-center">QUẢN TRỊ VIÊN MOVIE W3B</h4>

                            <form action="{{ url('admin') }}" method="post">

                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Tên đăng nhập</label> 
                                    <input type="text" name="email" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label> 
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked"> 
                                        <label class="form-check-label text-dark" for="flexCheckChecked">Ghi nhớ đăng nhập</label>
                                    </div>
                                    <a class="text-primary fw-bold text-decoration-none" href="{{ route('home') }}"> 
                                        <i class="fa-solid fa-arrow-left"></i>Quay về Movie W3b
                                    </a>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 fs-5 mb-4 rounded-4">Đăng nhập</button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@include('admin.components.footer')
</body>
</html>
