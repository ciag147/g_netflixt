@extends('layouts.web')

@section('title', 'Nhập OTP')

@section('content')

<section class="normal-breadcrumb set-bg"
         data-setbg="{{asset('img/login-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Quên Mật Khẩu</h2>
                    <p>Chào Mừng Bạn Đến Website Chính Thức Của MOVIE W3B.</p>
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
                            <Strong class="text-info">2</Strong> <strong>.Nhập mã
                            OTP đã nhận được ở email của bạn. </strong><br> <Strong
                                class="text-info">3</Strong> .Tạo một mật khẩu mới.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-forgot card p-3 rounded-0" style="color: grey;">
                    <div class="step_form" style="color: grey;">
                        <form action="{{route('verifiedOtp')}}"
                              method="post">
                              @csrf
                            <div class="mb-3">
                                <label for="otp" class="form-label">Nhập Mã OTP: </label> <input
                                    type="text" class="form-control" name="otp" id="otp"/>
                                <small id="helpId" class="form-text text-muted">Nhập mã
                                    OTP hệ thống đã gửi cho bạn trong hòm thư điện tử !</small>

                            </div>
                            <hr>
                            <button type="submit"
                                    class="btn btn-success rounded-0 p-2 ps-4 px-4 fw-bold text-white">
                                TIẾP TỤC
                            </button>
                            <a type="button" href="{{route('showForgotPassPage')}}"
                               class="btn btn-danger rounded-0 p-2 ps-4 px-4 fw-bold  text-white"
                               role="button">TRỞ LẠI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset("js/validateUser.js")}}"></script>

@endsection