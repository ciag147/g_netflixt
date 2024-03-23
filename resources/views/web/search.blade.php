@extends('layouts.web')

@section('title', 'Movie W3b - Tìm kiếm')

@section('content')
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>KẾT QUẢ TÌM KIẾM</h4>
                            </div>
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

                <div>
                    {{ $videos->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection