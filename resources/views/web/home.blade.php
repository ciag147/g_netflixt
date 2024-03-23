@extends('layouts.web')

@section('title', 'Movie W3b - Trang chủ')

@section('content')

<!-- slider: start -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($trendingVideos as $trendingVideo)
            <div class="hero__items set-bg" data-setbg="{{ $trendingVideo->poster }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{ $trendingVideo->category->name }}</div>
                            <h2>{{ $trendingVideo->title }}</h2>
                            <p>Thể loại: {{ $trendingVideo->category->name }}</p>
                            @if ($trendingVideo->price == 0)
                            <a href="{{ route('video.watch', ['v' => $trendingVideo->href])}}"><span>Xem Ngay</span> <i class="fa fa-angle-right"></i></a>
                            @else
                            <a href="{{ route('video.details', ['v' => $trendingVideo->href])}}" class="watch-btn"><span>{{ number_format($trendingVideo->price, 0, ',', '.') .
                                    '₫' }}
                                </span>
                                <i class="fa fa-angle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- slider: end -->

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>PHIM MỚI RA MẮT</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all m-0">
                                <a href="#" class="primary-btn">Xem Tất Cả <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($videos as $video)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="{{ route('video.details', ['v' => $video->href]) }}">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $video->poster}}">
                                        <div class="comment">
                                            <i class="fa-solid fa-heart"></i> {{ count($video->histories) }}
                                        </div>
                                        <div class="view" style="margin-right: 50px">
                                            <i class="fa-solid fa-comment"></i> {{ count($video->comments) }}
                                        </div> 
                                        <div class="view">
                                            <i class="fa fa-eye"></i> {{ $video->view}}
                                        </div>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <ul class="d-flex align-items-center justify-content-between">
                                        <li>{{ $video->category->name }}</li>
                                        @php
                                        \Illuminate\Support\Facades\App::setLocale('vi'); 
                                        @endphp
                                        <p class="time-ago mb-0">{{ $video->createdAt->diffForHumans() }}</p>
                                    </ul>

                                    <h5>
                                        <a href="#">{{ $video->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    {{ $videos->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>TOP XEM HÀNG ĐẦU</h5>
                        </div>
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">Ngày</li>
                            <li data-filter=".week">Tuần</li>
                            <li data-filter=".month">Tháng</li>
                            <li data-filter=".years">Năm</li>
                        </ul>
                        <div class="filter__gallery">
                            <div class="product__sidebar__view__item set-bg mix day years"
                                 data-setbg="{{ asset('img/sidebar/tv-1.jpg') }}">
                                <div class="ep">41 Tập</div>
                                <div class="view">
                                    <i class="fa fa-eye"></i> 20
                                </div>
                                <h5>
                                    <a href="#">Tân Ỷ Thiên Đồ Long Ký </a>
                                </h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix month week"
                                 data-setbg="{{ asset('img/sidebar/tv-2.jpg') }}">
                                <div class="ep">42 Tập</div>
                                <div class="view">
                                    <i class="fa fa-eye"></i> 15
                                </div>
                                <h5>
                                    <a href="#">Điệp Viên Huyền Thoại</a>
                                </h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix week years"
                                 data-setbg="{{ asset('img/sidebar/tv-3.jpg') }}">
                                <div class="ep">57 Tập</div>
                                <div class="view">
                                    <i class="fa fa-eye"></i> 100
                                </div>
                                <h5>
                                    <a href="#">Tây Du Ký</a>
                                </h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix years month"
                                 data-setbg="{{ asset('img/sidebar/tv-4.jpg') }}">
                                <div class="ep">44 Tập</div>
                                <div class="view">
                                    <i class="fa fa-eye"></i> 20
                                </div>
                                <h5>
                                    <a href="#">Sự Thật Phanh Phui</a>
                                </h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix day"
                                 data-setbg="{{ asset('img/sidebar/tv-5.jpg') }}">
                                <div class="ep">3 Tập</div>
                                <div class="view">
                                    <i class="fa fa-eye"></i> 56
                                </div>
                                <h5>
                                    <a href="#">Diệp Vấn</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>BÌNH LUẬN MỚI</h5>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset('img/sidebar/comment-1.jpg') }}"
                                     alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Phim khoa học viễn tưởng</li>
                                </ul>
                                <h5>
                                    <a href="#">very good</a>
                                </h5>
                                <span><i class="fa fa-eye"></i> 300 Lượt xem</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset('img/sidebar/comment-2.jpg') }}"
                                     alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Phim hành động Mỹ</li>
                                </ul>
                                <h5>
                                    <a href="#">Phim hay quá mọi người ơi</a>
                                </h5>
                                <span><i class="fa fa-eye"></i> 100 Lượt xem</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset('img/sidebar/comment-3.jpg') }}"
                                     alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Phim hiếm hiệp Trung Quốc</li>
                                </ul>
                                <h5>
                                    <a href="#">Phim đỉnh quá</a>
                                </h5>
                                <span><i class="fa fa-eye"></i> 130 Lượt xem</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection