<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên</title>
    @include('admin.components.head')
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    @include('admin.components.assied')
    <div class="body-wrapper">
        @include('admin.components.header')
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary float-end" href="/admin/video/add" role="button">
                        <i class="fas fa-plus-circle"></i> Phim mới
                    </a>
                    <h5 class="card-title fw-semibold mb-4 mt-2">Danh Sách Phim Đang Công Chiếu</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Poster</th>
                                        <th scope="col">Tên phim</th>
                                        <th scope="col">Thể loại</th>
                                        <th scope="col">Giá tiền</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $index => $video)
                                        <tr>
                                            <td scope="row">{{ ($videos->currentPage() - 1) * $videos->perPage() + $index + 1 }}</td>
                                            <td><img src="{{ $video->poster }}" class="img-fluid" width="250px" alt=""></td>
                                            <td>{{ $video->title }}</td>
                                            <td width="150px">{{ $video->category->name }}</td>
                                            <td>
                                                @php
                                                    $amount = $video->price;
                                                    $locale = 'vi_VN';
                                                    setlocale(LC_MONETARY, $locale);
                                                    $formattedAmount = number_format($amount, 0, '.', '.') . ' ' . trans('messages.currency');
                                                @endphp
                                                {{ $formattedAmount }}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <!-- <a href="/admin/video/edit?v={{ $video->href }}" class="btn btn-primary ms-2 rounded-2">Sửa</a> -->
                                                    <a href="{{ route('admin.video.edit', ['id' => $video->id]) }}" class="btn btn-primary ms-2 rounded-2">Sửa</a>
                                                    <button class="btn btn-danger ms-2 rounded-2" onclick="deactivateVideo({{ $video->id }})">Xoá</button>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalLiveDemo{{ $index }}" class="btn btn-success ms-2 rounded-2">Xem</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalLiveDemo{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                <div class="modal-content">
                                                    <iframe id="player" width="100%" height="600" src="https://www.youtube.com/embed/{{ $video->href }}" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">{{ $videos->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.components.footer')
<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Video đã được chuyển sang trạng thái ngừng công chiếu thành công!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
    // lấy href	sử dụng cho edit video
    function editVideoGetHref(href) {
        document.getElementById("videoEditHref").value = href;
        document.getElementById("editForm").submit();
    }

    function deactivateVideo(videoId) {
        if (confirm('Bạn có chắc chắn muốn xóa video này không?')) {
            fetch(`/admin/video/${videoId}/deactivate`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    $('#successModal').modal('show');
                    location.reload(); // Load lại trang sau khi xóa thành công
                } else {
                    throw new Error('Đã xảy ra lỗi khi xóa video!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Đã xảy ra lỗi khi xóa video!');
            });
        }
    }

    </script>
</body>
</html>
