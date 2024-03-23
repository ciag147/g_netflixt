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
                        <h5 class="card-title fw-semibold mb-4 mt-2">Cập nhật người dùng</h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="ConfirmEditForm" action="{{ route('admin.user.update', $user->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email">
                                    </div>
                                    <fieldset>
                                        <div class="mb-3">
                                            <label class="form-label">Họ tên</label>
                                            <input type="text" class="form-control" value="{{ $user->fullname }}" name="fullname" id="ho-ten">
                                        </div>
                                    </fieldset>
                                    <div class="mb-3">
                                        <label for="dao-dien" class="form-label">Trạng thái hoạt động</label>
                                        <select class="form-select" name="isActive" id="trang-thai">
                                            <option value="1" {{ $user->isActive == 1 ? 'selected' : '' }}>Hoạt động</option>
                                            <option value="0" {{ $user->isActive == 0 ? 'selected' : '' }}>Ngưng hoạt động</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dien-vien" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" id="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="the-loai" class="form-label">Vai trò</label>
                                        <select class="form-select" name="roleId" id="vai-tro">
                                            <option value="1" {{ $user->roleId == 1 ? 'selected' : '' }}>Quản trị viên</option>
                                            <option value="2" {{ $user->roleId == 2 ? 'selected' : '' }}>Người dùng</option>
                                        </select>
                                    </div>                                                   
                                    <input type="hidden" id="confirmEdit" value="false" />
                                    <button type="submit" class="btn btn-success">Xác nhận</button>
                                    <button type="reset" class="btn btn-primary">Làm mới</button>
                                    <a class="btn btn-danger float-end" href="/admin/users" role="button">Trở về</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.footer')
    @if(session('updateUserSuccess') !== null)
        <script>
            showSwalAlert('success', 'Cập nhât người dùng thành công');
        </script>
    @endif
</body>
</html>
