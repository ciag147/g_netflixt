@extends('layouts.web')

@section('title', 'Movie W3b - '.$video->title)

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a> <a
                        href="{{ route('video.category', ['code' => $video->category->code]) }}">{{
                        $video->category->name }}</a> <span>{{ $video->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ $video->poster }}">
                        <img class="img-fluid" src="{{ $video->poster }}" alt="">
                        <div class="comment">
                            <i class="fa fa-comments"></i> {{ count($video->comments) }}
                        </div>
                        <div class="view">
                            <i class="fa fa-eye"></i> {{ $video->view }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="row">
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="anime__details__title">
                                    <h3>{{ $video->title }}</h3>
                                    <span>Quốc gia: Việt Nam</span>
                                </div>
                            </div>

                            @auth
                            <div class="col-12 col-md-3 col-lg-3">
                                <form id="ratingForm" action="${initParam['mvcPath']}/video/rating" method="post">
                                    <div class="anime__details__rating">
                                        <div class="rating-start">
                                            {{-- <input type="radio" name="rating" id="rating-5" value="5"
                                                ${checkedAttribute5}> <label for="rating-5"></label>
                                            <input type="radio" name="rating" id="rating-4" value="4"
                                                ${checkedAttribute4}> <label for="rating-4"></label>
                                            <input type="radio" name="rating" id="rating-3" value="3"
                                                ${checkedAttribute3}> <label for="rating-3"></label>
                                            <input type="radio" name="rating" id="rating-2" value="2"
                                                ${checkedAttribute2}> <label for="rating-2"></label>
                                            <input type="radio" name="rating" id="rating-1" value="1"
                                                ${checkedAttribute1}> <label for="rating-1"></label> --}}
                                            <input class="href" name="href" type="hidden" value="{{ $video->href }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endauth
                        </div>

                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <ul>
                                        <li><span>Diễn viên:</span> {{ $video->actor }}</li>
                                        <li><span>Đạo diễn:</span> {{ $video->director }}</li>
                                        <li><span>Thể loại:</span> {{ $video->category->name }}</li>
                                        <li><span>Mô tả:</span> {{ $video->description }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="anime__details__btn">
                            @auth
                            <button id="likeButton" class="follow-btn" style="border: none; white-space: nowrap; width: 120px;
                            box-sizing: border-box;">
                                @if ($flagLikeButton)
                                Bỏ Thích
                                @else
                                Thích
                                @endif
                            </button>

                            <button type="button" class="follow-btn border-0" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa-regular fa-share-from-square"></i> Chia sẻ
                            </button>
                            
                            @endauth

                            @if ($video->price == 0)
                            <a href="{{ route('video.watch', ['v' => $video->href]) }}" class="watch-btn"><span>Xem
                                    ngay</span> <i class="fa fa-angle-right"></i></a>
                            @else
                                @if (($order ?? null) && $order->vnp_ResponseCode == '00')
                                <a href="{{ route('video.watch', ['v' => $video->href]) }}" class="watch-btn"><span>Xem
                                        ngay</span> <i class="fa fa-angle-right"></i></a>

                                @else
                                <a style="cursor: pointer;" class="payBtn watch-btn"><span>{{
                                        number_format($video->price, 0, ',', '.') .
                                        '₫' }}</span> <i class="fa fa-angle-right"></i></a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    @if (count($comments) > 0)
                    <div class="section-title">
                        <h5 class="mb-6">Đánh giá</h5>
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
                                    {{ $comment->createdBy->fullname }} - <span>{{ $carbonDate->diffForHumans()
                                        }}</span>
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
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection

@section('additional-scripts')
<script type="text/javascript" src="{{asset('js/showMoreComment.js')}}"></script>
<script type="text/javascript">
    const likeButton = document.querySelector('#likeButton');
    likeButton.onclick = () => {
        loadingContainer.classList.remove("invisible");
        const href = document.querySelector('.href').value;
        fetch(`/api/video/like?v=${href}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            loadingContainer.classList.add("invisible");
            if(data.isLiked){
                likeButton.innerText = 'Bỏ thích';
            }else{
                likeButton.innerText = 'Thích';
            }
        })
}
</script>

@guest
<script type="text/javascript">
    const payBtn = document.querySelector('.payBtn');
    payBtn.onclick = () => {
        Swal.fire({
            title: 'Thông báo',
            text: "Vui lòng đăng nhập trước khi thanh toán",
            icon: 'warning',
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: '#27ae60',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/login";
            }
        })
    }
</script>
@else
<script type="text/javascript">
    const payBtn = document.querySelector('.payBtn');
    payBtn.onclick = () => {
        Swal.fire({
            title: 'Xác nhận',
            text: "Bạn có chắc chắn muốn mua phim này không ?",
            icon: 'warning',
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: '#27ae60',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                const href = document.querySelector('.href').value;
                window.location.href = `/payment/vnp?v=${href}`; 
            }
        })
    }
</script>
@endguest

@if (session('paySuccess') ?? '')
<script type="text/javascript">
Swal.fire({
    title: 'Thông báo',
    text: "Chúc mừng bạn đã mua phim thành công!",
    icon: 'success',
    showCloseButton: true,
    confirmButtonColor: '#27ae60',
    confirmButtonText: 'OK'
})
</script>
@endif

@if (session('payBeforeWatch') ?? '')
  <script type="text/javascript">
      Swal.fire({
        title: 'Thông báo',
        text: "Bạn chưa mua phim này!",
        icon: 'info',
        showCloseButton: true,
        confirmButtonColor: '#27ae60',
        confirmButtonText: 'OK'
      })
  </script>
  @endif
@endsection