@extends('layouts.web')

@section('title', 'Trang cá nhân')

@section('content')

<section
      class="normal-breadcrumb set-bg"
      data-setbg="{{ asset('img/profile/normal-breadcrumb.jpg') }}"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="normal__breadcrumb__text">
              <h2>Trang cá nhân</h2>
              <p>Chào mừng bạn đến với website chính thức của MOVIE W3B</p>
            </div>
          </div>
        </div>
      </div>
    </section>
   

    <!-- Login Section Begin -->
	<section class="login spad container">
		<div class="rounded-lg">
			<div class="row bg-white p-5 m-1" style="border-radius: 6px">

				<div class="col-12 col-md-3 col-lg-3">

					<div class="img-profile">

						<img src="{{ asset('img/profile/profile-logo.png') }}"
							class="img-fluid rounded-top" width="60%">

					</div>

					<div class="link-profile">

						<h6 class="text-dark font-weight-bold mb-2">
							<a href="transaction" class="text-info font-weight-bold">Lịch sử
								giao dịch</a>
						</h6>
						<h6 class="text-dark font-weight-bold mb-2">
							<a href="favorites" class="text-info font-weight-bold">Phim
								yêu thích</a>
						</h6>

					</div>

				</div>

				<div class="col-12 col-md-9 col-lg-9">

					<div class="profile-name">

						<div class="row">

							<div class="col-12 col-md-12 col-lg-9">

								<h4 class="text-dark font-weight-bold">MOVIE W3B</h4>
								<span class="text-info font-weight-bold">Nền tảng xem phim trực tuyến</span>

							</div>

							<div class="col-lg-3">

								<h4>
									 <a href="{{route('showFrmProfile')}}" 
										class="text-info font-weight-bold text-decoration-none h6">
										Chỉnh sửa thông tin </a>
								</h4>

							</div>

						</div>

						<hr class="text-dark">

					</div>

					<div class="info mt-5">

						<h4 class="text-dark mb-3 font-weight-bold">Thông tin</h4>

						<div class="row">

							<div class="col-lg-6">

								<h6 class="text-dark mt-4">Họ và tên:</h6>
								<h6 class="text-dark mt-4">Email:</h6>
								<h6 class="text-dark mt-4">Số điện thoại:</h6>
							</div>

							<div class="col-lg-6">

								<h6 class="text-dark mt-4">{{Auth::user()->fullname}}</h6>
								<h6 class="text-dark mt-4">{{Auth::user()->email}}</h6>
								<h6 class="text-dark mt-4">{{Auth::user()->phone}}</h6>

							</div>

						</div>

					</div>

				</div>

			</div>
		</div>
	</section>
	<!-- Forgotpass Section End -->
    @endsection
    
