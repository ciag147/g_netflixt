<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên - Chỉnh Sửa</title>
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
                        <h5 class="card-title fw-semibold mb-4 mt-2">Chỉnh Sửa Phim</h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="ConfirmEditForm" action="{{ route('admin.video.update', $video->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tên phim</label>
                                        <input type="text" class="form-control" value="{{ $video->title }}" name="title" id="title">
                                    </div>
                                    <fieldset>
                                        <div class="mb-3">
                                            <label class="form-label">Link phim</label>
                                            <input type="text" class="form-control" value="{{ $video->href }}" name="href" readonly>
                                        </div>
                                    </fieldset>
                                    <div class="mb-3">
                                        <label for="dao-dien" class="form-label">Đạo diễn</label>
                                        <input type="text" class="form-control" value="{{ $video->director }}" name="director" id="dao-dien">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dien-vien" class="form-label">Diễn viên</label>
                                        <input type="text" class="form-control" value="{{ $video->actor }}" name="actor" id="dien-vien">
                                    </div>
                                    <div class="mb-3">
                                        <label for="the-loai" class="form-label">Thể loại</label>
                                        <select class="form-select" name="categoryId" id="the-loai">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $video->categoryId ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Giá</label>
                                        <input type="text" class="form-control" value="{{ $formattedPrice }}" oninput="formatPrice(this)" name="price" placeholder="Giá...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noted" class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="noted" name="description" rows="5">{{ $video->description }}</textarea>
                                    </div>
                                    <input type="hidden" id="confirmEdit" value="false" />
                                    <button type="submit" class="btn btn-success">Xác nhận</button>
                                    <button type="reset" class="btn btn-primary">Làm mới</button>
                                    <a class="btn btn-danger float-end" href="/admin/videos" role="button">Trở về</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.footer')
    @if(session('updateVideoSuccess') !== null)
        <script>
            showSwalAlert('success', 'Chỉnh sửa video thành công');
        </script>
    @endif
</body>
</html>
