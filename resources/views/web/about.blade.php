@extends('layouts.web')

@section('title', 'Movie W3b - Giới thiệu')

@section('content')
<section class="normal-breadcrumb set-bg" style="height: 675px;"
         data-setbg="{{ asset('img/about/banner.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2 style="font-weight: 800;">Movie W3b</h2>
                    <p style="font-size: 36px; font-weight: 700;">Nền tảng xem phim trực tuyến</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-4">
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('img/about/pic-1') }}.png" alt=""/>
        </div>
        <div class="col-8">
            <h2 class="text-white font-weight-bolder mt-6 fs-10">Về chúng tôi</h2>
            <p class="text-white fs-4 mt-4">Movie W3b là một website xem phim trực tuyến miễn phí với kho phim khổng lồ, bao gồm nhiều thể loại phim khác nhau, từ phim bom tấn Hollywood đến phim điện ảnh Việt Nam, phim truyền hình, phim hoạt hình, phim tài liệu,...</p>
            <p class="text-white fs-4 mt-2">Với kho phim đa dạng, người dùng có thể tìm thấy bất kỳ bộ phim nào mình yêu thích, bất kể là thể loại gì. Từ những bộ phim hành động, bom tấn, viễn tưởng, kinh dị,... cho đến những bộ phim tình cảm, hài hước, lãng mạn,... đều có mặt trên Movie W3b.</p>
            <p class="text-white fs-4 mt-2">Ngoài ra, website cũng thường xuyên cập nhật các bộ phim mới, mang đến cho người dùng những trải nghiệm xem phim mới mẻ và thú vị.</p>
        </div>
    </div>
</section>
<section class="container" style="padding-bottom: 24px">
    <div class="row align-items-center">
        <div class="col-8 text-white">
            <h3 class="font-weight-bolder fs-12">Học viện Kỹ thuật mật mã </h3>
            <h4 class="mt-4">Lê Thanh Giác - CT06N0118</h4>
        </div>
        <div class="col-4">
            <img src="{{ asset('img/about/pic-2') }}.png" alt=""/>
        </div>
    </div>
</section>
@endsection