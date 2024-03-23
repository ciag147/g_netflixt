<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên</title>
    @include('admin.components.head')
</head>
<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical"
     data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('admin.components.assied')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

        <!--  Header Start -->
        @include('admin.components.header')
        <!--  Header End -->

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title fw-semibold mb-4 mt-2">Danh Sách Các
                        Lượt Yêu Thích Từng Video</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên phim</th>
                                        <th scope="col">Đạo diễn</th>
                                        <th scope="col">Số lượt thích</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $index => $video)
                                        <tr>
                                            <td scope="row">{{ ($videos->currentPage() - 1) * $videos->perPage() + $index + 1 }}</td>
                                            <td>{{ $video->title }}</td>
                                            <td>{{ $video->director }}</td>
                                            <td width="130px">{{ $video->total_likes }}</td>
                                            <td width="155px">
                                                @if($video->isActive)
                                                    Đang công chiếu
                                                @else
                                                    Ngưng công chiếu
                                                @endif
                                            </td>
                                            <td><button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modalLiveDemo{{ $index }}"
                                                        class="btn btn-success ms-2 rounded-2">Xem</button></td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalLiveDemo{{ $index }}"
                                             tabindex="-1" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                <div class="modal-content">
                                                    <iframe id="player" width="100%" height="600"
                                                            src="https://www.youtube.com/embed/{{ $video->href }}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            @if($currentPage == 1)
                                <li class="page-item text-secondary disabled"><a
                                        class="page-link" href="#" aria-disabled="true"> 
                                        <i class="fas fa-chevron-left"></i>
                                    </a></li>
                            @endif

                            @if($currentPage > 1)
                                <li class="page-item text-secondary">
                                    <a class="page-link"
                                        href="/admin/videos/liked?page={{ $currentPage - 1 }}"
                                        aria-disabled="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif

                            @foreach(range(1, $maxPage) as $i)
                                <li class="page-item text-secondary {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link"
                                       href="/admin/videos/liked?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endforeach

                            @if($currentPage == $maxPage)
                                <li class="page-item text-secondary disabled"><a
                                        class="page-link" href="#" aria-disabled="true"> <i
                                            class="fas fa-chevron-right"></i>
                                    </a></li>
                            @endif

                            @if($currentPage < $maxPage)
                                <li class="page-item text-secondary"><a class="page-link"
                                                                        href="/admin/videos/liked?page={{ $currentPage + 1 }}"
                                                                        aria-disabled="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.components.footer')
</body>
</html>
