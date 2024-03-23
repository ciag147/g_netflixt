@extends('layouts.web')

@section('title', 'Nhập mật khẩu mới')

@section('content')
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg"
         data-setbg="{{asset('img/login-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Quên Mật Khẩu</h2>
                    <p>Chào Mừng Bạn Đến Website Chính Thức Của Movie W3b.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-forgot card p-3 mb-4 rounded-0"
                     style="color: grey;">
                    <h3 class="mb-2" style="font-weight: 700; color: grey;">Quên
                        Mật Khẩu ?</h3>
                    <p class="mb-3">thay đổi mật khẩu của bạn trong ba bước đơn
                        giản. Điều này sẽ giúp bạn bảo mật mật khẩu của bạn.</p>

                    <div class="step_form" style="color: grey;">
                        <p>
                            <Strong class="text-info">1</Strong> .Nhập địa chỉ Email của
                            bạn. Hệ thống của sẽ gửi cho bạn một mã OTP vào email của bạn. <br>
                            <Strong class="text-info">2</Strong> .Nhập mã OTP đã nhận được ở
                            email của bạn. <br> <Strong class="text-info">3</Strong><strong>
                            .Tạo một mật khẩu mới.</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-forgot card p-3 rounded-0" style="color: grey;">
                    <div class="step_form" style="color: grey;">
                        <form onsubmit="return validateNewPassword()"
                              action="{{route('setNewPass')}}" method="POST">
                              @csrf
                            <div class="mb-3">
                                <label for="pass" class="form-label">Nhập mật khẩu mới:
                                </label> <input type="password" class="form-control" name="password" id="pass">
                            </div>
                            <div class="mb-3">
                                <label for="passConfirm" class="form-label">Nhập lại
                                    mật khẩu: </label> <input type="password" class="form-control"
                                                              name="confirm-password" id="passConfirm">
                            </div>
                            <hr>
                            <button type="submit"
                                    class="btn btn-success rounded-0 p-2 ps-4 px-4 fw-bold text-white">
                                TIẾP TỤC</button>
                            <a href="{{route('login')}}"
                               class="btn btn-danger rounded-0 p-2 ps-4 px-4 fw-bold  text-white"
                               role="button">TRỞ LẠI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/validateUser.js')}}"></script> 
@endsection