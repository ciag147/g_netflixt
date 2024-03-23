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
                    <h5 class="card-title fw-semibold mb-4 mt-2">Danh Sách Người Dùng Yêu Thích Video</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('userlike') }}" method="GET">
                                <div class="mb-3">
                                    <label class="form-label">Tên phim:</label>
                                    <select name="href" id="selectVideo" class="form-select form-select-lg rounded-2 fs-3" style="height: 38.6px;">
                                        <option selected disabled>---Chọn tên phim---</option>
                                        @foreach($videos as $video)
                                            <option value="{{ $video->id }}" {{ old('href') == $video->id ? 'selected' : '' }}>{{ $video->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>

                    <h5 class="card-title fw-semibold mb-4 mt-2">Danh Sách Người Dùng Yêu Thích Bộ Phim</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Họ tên</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $index => $user)
                                            <tr>
                                                <td scope="row">{{ $index + 1 }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->isActive ? 'Đang hoạt động' : 'Ngưng hoạt động' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@include('admin.components.footer')
</body>
</html>
