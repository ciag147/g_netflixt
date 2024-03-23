@extends('layouts.web')

@section('title', 'Xác thực thành công')

@section('content')
<!-- Blog Details Section Begin -->
<section class="blog-details spad" style="min-height: 73vh">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__text">
                        <p>
                            <i class="fa-solid fa-check"></i> Tài khoản {{Session()->get('activate-success')}} đã được
                            kích hoạt thành công !
                        </p>
                        <a role="button" href="{{route('showFormLogin')}}" class="site-btn">Đăng nhập</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__title">
                    <h6>
                        <fmt:formatDate value="${now}" pattern="EEE, HH:mm:ss, dd-MM-yyyy"/>
                    </h6>
                    <div class="blog__details__social">
                        <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i>
                            Facebook</a>
                        <a href="#" class="pinterest"><i class="fa-brands fa-pinterest"></i> Pinterest</a>
                        <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i>
                            Linkedin</a>
                        <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i> Twitter</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
<!-- Blog Details Section End -->