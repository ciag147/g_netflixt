@extends('layouts.web')

@section('title', 'Movie W3b - '.$video->title)

@section('content')
<!-- Breadcrumb Begin -->
<div id="breadcrumb" class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Trang chủ</a> 
                    <a href="{{ route('video.category', ['code' => $video->category->code]) }}">{{ $video->category->name }}</a> <span>{{ $video->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div id="video" class="col-lg-12">
                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->href }}"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__review">
                    @if (count($comments) > 0)
                    <div class="section-title">
                        <h5 class="mb-6">Bình luận</h5>
                    </div>
                    
                    <div class="review-container">
                        @foreach ($comments as $comment )
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('img/default-avt.jpg') }}" alt="" />
                            </div>
                            <div class="anime__review__item__text">
                                @php
                                \Illuminate\Support\Facades\App::setLocale('vi');
                                $carbonDate = \Carbon\Carbon::parse($comment->createdAt);
                                @endphp
                                <h6>
                                    {{ $comment->createdBy->fullname }} - <span>{{ $carbonDate->diffForHumans() }}</span>
                                </h6>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        @if ($comments->lastPage() > 1)
                        <div class="float-right">
                            <span class="showMoreBtn">Hiển thị thêm bình luận <i class="fa-solid fa-angle-down"></i></span>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Để lại đánh giá</h5>
                    </div>

                    <form id="voteFrm" action="{{ route('video.comment') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <textarea id="voteInp" placeholder="Nội dung..." name="content" required></textarea>
                        <input class="href" name="href" type="hidden" value="{{ $video->href }}">
                        @auth
                        <button id="voteFrmBtn" type="submit">
                            <i class="fa fa-location-arrow"></i> Gửi Bình Luận
                        </button>
                        @else
                        <button id="guestBtn" type="button">
                            <i class="fa fa-location-arrow"></i> Gửi Bình Luận
                        </button>
                        @endauth
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('additional-scripts')
<script type="text/javascript">
    const voteInp = document.querySelector('#voteInp');
    voteInp.onfocus = function() {
        const headerHeight = document.querySelector('#top-header').clientHeight;
        const breadcrumbHeight = document.querySelector('#breadcrumb').clientHeight;
        const playerHeight = document.querySelector('#video').clientHeight;
        const totalHeight = headerHeight + breadcrumbHeight + playerHeight;
        localStorage.setItem('scrollTop', totalHeight);
    };
    window.addEventListener('load', function() {
        const scrollTop = localStorage.getItem('scrollTop') || 0;
        window.scrollTo(0, parseInt(scrollTop));
        localStorage.removeItem('scrollTop'); 
    });

</script>
<script type="text/javascript">
    const guestBtn = document.querySelector('#guestBtn');
    guestBtn.onclick = () => {
        Swal.fire({
        title: 'Thông báo',
        text: "Vui lòng đăng nhập trước khi bình luận",
        icon: 'info',
        showCloseButton: true,
        showCancelButton: true,
        focusCancel: false,
        cancelButtonColor: '#e74c3c',
        cancelButtonText: 'Huỷ',
        confirmButtonColor: '#27ae60',
        confirmButtonText: '<a style="color: white;" href="{{ route('showFormLogin')}}">Đăng Nhập</a>'
    })
    }
</script>
<script src="{{ asset('js/showMoreComment.js') }}" type="text/javascript"></script>
@endsection

