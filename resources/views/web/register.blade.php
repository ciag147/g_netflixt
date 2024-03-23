@extends('layouts.web')

@section('title', 'Đăng ký')

@section('content')


<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg"
         data-setbg="{{asset('img/login-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Đăng Ký</h2>
                    <p>Chào mừng bạn đến với website chính thức của MOVIE W3B</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="login__form">
                    <h3>Đăng ký</h3>
                    <form 
                    onsubmit = "return validateRegisterForm()"
                    id="register-form-submit" action="{{route('register')}}"
                          method="POST">
                          @csrf
                        <div class="input__item">
                        <i class="fa-solid fa-envelope"></i>                            <input type="text" name="email" placeholder="Địa chỉ Email">
                        </div>
                        <div class="input__item">
                        <i class="fa-solid fa-user"></i>
                            <input type="text" name="fullname" placeholder="Họ và tên">
                        </div>
                        <div class="input__item">
                        <i class="fa-solid fa-phone"></i>
                            <input type="text" name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="input__item">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="input__item">
                        <i class="fa-solid fa-lock"></i>
                            <input type="password" name="passwordConfirm"
                                   placeholder="Nhập lại mật khẩu"> 
                        </div>
                        <button type="submit" id="submitRegister" class="site-btn">Xác
                            nhận
                        </button>
                    </form>
                    <h5>
                        Bạn đã có tài khoản ? <a href="{{route('showFormLogin')}}">Đăng nhập ngay</a>
                    </h5>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="login__social__links">
                    <h3>Đăng nhập với:</h3>
                    <ul>
                        <li><a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i> Đăng nhập với Facebook</a></li>
                        <li><a
                                href="#"
                                class="google"><i class="fa-brands fa-google"></i> Đăng nhập với
                            Google</a></li>
                        <li><a href="#" class="twitter"><i class="fa-brands fa-twitter"></i>
                            Đăng nhập với Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/validateUser.js')}}"></script>
@endsection