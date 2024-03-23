@extends('layouts.web')

@section('title', 'Trang Cá Nhân - Đổi Mật Khẩu')

@section('content')

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg"
		data-setbg="{{ asset('img/profile/normal-breadcrumb.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="normal__breadcrumb__text">
						<h2>Trang Cá Nhân</h2>
						<p>Chào Mừng Bạn Đến Blog Chính Thức Của MOVIE W3B.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Normal Breadcrumb End -->

	<!-- Login Section Begin -->
	<section class="login spad container">
		<div class="row bg-white rounded-4 p-5 m-1"
			style="box-shadow: 4px 4px 4px rgba(190, 190, 190, 0.5); border-radius: 6px;">

			<div class="col-12 col-md-3 col-lg-3">

				<div class="img-profile">

					<img src="{{ asset('img/profile/profile-logo.png') }}"
						class="img-fluid">

				</div>

				<div class="link-profile">

					<h6 class="text-secondary text-center mb-2">{{Auth::user()->fullname}}</h6>
					<h6 class="text-secondary text-center mb-2">{{Auth::user()->email}}</h6>
					<h6 class="text-secondary text-center">
						<img src="{{ asset('img/profile/vn.png') }}" class="img-fluid"
							width="20px"> Việt Nam
					</h6>

				</div>

			</div>

			<div class="col-12 col-md-9 col-lg-9">

				<div class="profile-name">

					<div class="row">

						<div class="col-6 col-md-8 col-lg-9">

							<span> <a href="editprofile"
								class="text-info fs-6 text-decoration-none font-weight-bold">
								<i class="fa-solid fa-angle-left"></i> Quay về
							</a>
							</span>

						</div>

					</div>

					<hr class="text-dark">

				</div>

				<div class="info mt-5">

					

					<div class="row">

						<div class="col-12 col-md-12 col-lg-12">

							<form id="form" autocomplete="off"
								onsubmit="return validateChangePass()" action="{{route('changePass')}}"
								method="post">
								@csrf

								<fieldset disabled>
									<div class="mb-4">
										<input type="text" 
											   class="form-control disable"
											   value="{{Auth::user()->fullname}}" 
											   placeholder="username">
									</div>
								</fieldset>

								<div class="mb-4">
									<input type="password" 
										   class="form-control" 
										   name="oldPass"
										   placeholder="Mật khẩu cũ">
								</div>

								<div class="mb-4">
									<input type="password" 
									class="form-control" 
									name="newPass"
									placeholder="Mật khẩu mới">
								</div>

								<div class="mb-4">
									<input type="password" 
									class="form-control" 
									name="cofirmPass"
									placeholder="Nhập lại mật khẩu">
								</div>

								<input type="hidden" name="confirmation" id="confirmationField"
									value="false" /> <input type="hidden" name="password"
									value="${password}" />

								<button type="submit" class="btn btn-outline-success">Đổi mật khẩu</button>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>
	<!-- Forgotpass Section End -->

    @endsection
