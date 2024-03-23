@extends('layouts.web')

@section('title', 'Đăng nhập')

@section('content')
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<section
      class="normal-breadcrumb set-bg"
      data-setbg="${pageContext.request.contextPath}/views/template/user/img/login-banner.png"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="normal__breadcrumb__text">
              <h2>Đăng Nhập</h2>
              <p>Chào mừng bạn đến với website chính thức của MOVIE W3B</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="login__form">
              <h3>Đăng Nhập</h3>
              <form
                action="{{route('login')}}"
                method="POST"
              >
              @csrf
                <div class="input__item">
                  <input type="text" name="email" placeholder="Email" />
                  <span class="icon_mail"></span>
                </div>
                <div class="input__item">
                  <input
                    type="password"
                    name="password"
                    placeholder="Mật khẩu"
                  />
                  <span class="icon_lock"></span>
                </div>
                <button type="submit" class="site-btn">Đăng Nhập Ngay</button>
              </form>
              <a
                href="${initParam['mvcPath']}/password/forgot"
                class="forget_pass"
                >Quên mật khẩu ?</a
              >
            </div>
          </div>
          <div class="col-lg-6">
            <div class="login__register">
              <h3>Bạn chưa có tài khoản ?</h3>
              <a href="{{route('showFormRegister')}}" class="primary-btn"
                >Đăng ký ngay</a
              >
            </div>
          </div>
        </div>
        <div class="login__social">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
              <div class="login__social__links">
                <span>Hoặc</span>
                <ul>
                  <li>
                    <a href="#" class="facebook"
                      ><i class="fa-brands fa-facebook-f"></i> Đăng nhập với
                      Facebook</a
                    >
                  </li>
                  <li>
                    <a href="#" class="google"
                      ><i class="fa-brands fa-google"></i> Đăng nhập với
                      Google</a
                    >
                  </li>
                  <li>
                    <a href="#" class="twitter"
                      ><i class="fa-brands fa-twitter"></i> Đăng nhập với
                      Twitter</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection