@extends('layouts.web')

@section('title', 'Đăng nhập')

@section('content')
<section
      class="normal-breadcrumb set-bg"
      data-setbg="{{asset('img/login-banner.png')}}"
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
              onsubmit = "return validateLoginForm()"
                action="{{route('login')}}"
                method="POST"
              >
              @csrf
                <div class="input__item">
                <i class="fa-solid fa-envelope"></i>                  <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input__item">
                  <i class="fa-solid fa-lock"></i>
                  <input
                    type="password"
                    name="password"
                    placeholder="Mật khẩu"
                  />
                  
                </div>
                <button type="submit" class="site-btn">Đăng Nhập Ngay</button>
              </form>
              <a
                href="{{route('showForgotPassPage')}}"
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
  @section('additional-scripts')
  <script src="{{asset('js/validateUser.js')}}"></script>

  @if (session('loginBeforeWatch') ?? '')
  <script type="text/javascript">
      Swal.fire({
        title: 'Cảnh báo',
        text: "Vui lòng đăng nhập trước khi thực hiện thao tác này!",
        icon: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#27ae60',
        confirmButtonText: 'OK'
      })
  </script>
  @endif
  @endsection