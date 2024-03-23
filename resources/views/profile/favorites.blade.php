@extends('layouts.web')

@section('title', 'Trang cá nhân')

@section('content')
<!-- Blog Section Begin -->
<section class="blog spad" style="padding-top: 70px">
		<div class="container">
			<div class="text-white text-center">
				<h4 class="font-weight-bold">Phim đã thích</h4>
				<br>
			</div>
			<div class="blog__details__title">
				<jsp:useBean id="now" class="java.util.Date" />
				<h6>
					<fmt:formatDate value="${now}" pattern="EEE, HH:mm:ss, dd-MM-yyyy" />
				</h6>
				<div class="blog__details__social">
					<a href="#" class="facebook"><i class="fa-brands fa-facebook"></i>Facebook</a> 
					<a href="#" class="pinterest"><i class="fa-brands fa-pinterest"></i></i>Pinterest</a>
					<a href="#"class="linkedin"><i class="fa-brands fa-linkedin"></i>Linkedin</a> 
					<a href="#" class="twitter"><i class="fa-brands fa-square-twitter"></i>Twitter</a>
				</div>
			</div>
			<div class="row">
                        @if(!$videos->isEmpty())
                        @foreach ($videos as $video)
                        <div class="col-lg-3 col-md-4 col-sm-6">
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
                        @else
                        <p style="color: #fff; font-size: 24px; font-weight: 600;margin-top: 16px;">Không tìm thấy kết quả thích hợp</p>
                        @endif
                    </div>

                </div>
	</section>
	<!-- Blog Section End -->
    @endsection