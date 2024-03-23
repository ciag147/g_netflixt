<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên - Thêm phim mới</title>
    @include('admin.components.head')
</head>
<body>
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
                        <h5 class="card-title fw-semibold mb-4 mt-2">Thêm Mới Phim</h5>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.video.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tên phim</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Nhập tên phim">
                                    </div>
                                    <div class="mb-3">
                                        <label for="link-phim" class="form-label">Href phim</label>
                                        <input type="text" class="form-control" name="href" id="link-phim" placeholder="Nhập href phim" onblur="fillHrefOnPoster()">
                                    </div>
                                    <div class="mb-3">
                                    <label for="dao-dien" class="form-label">Đạo diễn</label> <input
                                        type="text" class="form-control" name="director" id="dao-dien"
                                        placeholder="Nhập tên đạo diễn">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dien-vien" class="form-label">Diễn viên</label> <input
                                            type="text" class="form-control" name="actor"
                                            id="dien-vien" placeholder="Nhập tên diễn viên">
                                    </div>
                                    <div class="mb-3">
                                        <label for="the-loai" class="form-label">Thể loại</label> 
                                        <select class="form-select" name="categoryId" id="the-loai">
                                            @php
                                                use App\Models\Category;
                                                $categories = Category::all();
                                            @endphp
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Giá</label> <input type="text"
                                            class="form-control" oninput="formatPrice(this)" name="price"
                                            placeholder="Nhập giá phim">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noted" class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="noted" name="description"
                                                rows="5" placeholder="Nhập nội dung phim"></textarea>
                                    </div>

                                    <input type="hidden" class="form-control" id="poster"
                                        name="poster">

                                    <button type="submit" class="btn btn-success">Xác nhận</button>
                                    <button type="reset" class="btn btn-primary">Làm mới</button>
                                    <a class="btn btn-danger float-end" href="{{ route('admin.video.add') }}"
                                    role="button">Trở về</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.components.footer')
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Phim đã được thêm thành công!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
            </div>
        </div>
        </div>

    </div>

    <script>
        function fillHrefOnPoster() {
            var href = document.getElementById("link-phim").value;
            var poster = document.getElementById("poster");
            poster.value = "https://img.youtube.com/vi/" + href + "/maxresdefault.jpg";
        }

        function showSuccessModal() {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
        }
        
        @if(session('success'))
            showSuccessModal();
        @endif

    </script>
</body>
</html>
