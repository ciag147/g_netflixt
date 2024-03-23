<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên</title>
    @include('admin.components.head')
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical"
     data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    @include('admin.components.assied')

    <div class="body-wrapper">
        @include('admin.components.header')

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4 mt-2">Danh Sách Người Dùng</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Vai trò</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $index => $user)
                                        <tr class="{{ $user->isActive == false ? 'bg-light' : '' }}">
                                            <td scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if($user->roleId == 1)
                                                    Quản trị viên
                                                @else
                                                    Người dùng
                                                @endif
                                            </td>
                                            <td>                                               
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-primary ms-2 rounded-2">Cập nhật</a>
                                                </div>                     
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">{{ $users->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.components.footer')

<script>
    function EditUser(userId) {
        document.getElementById("UserId").value = userId;
        document.getElementById("EditUserForm").submit();
    }
</script>

@if(session('EditMessage'))
    <script>
        showCenterAlert('error', 'Thất bại !', 'Không thể chỉnh sửa nhân viên quản trị !');
    </script>
@endif

</body>
</html>
