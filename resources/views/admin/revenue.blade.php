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
                    <div class="mb-3">
                        <form action="{{ route('revenue') }}" method="GET">
                            <span class="text-primary">
                                <label for="year">Chọn Năm:</label>
                            </span>
                            <select class="form-select" id="year" name="year" onchange="this.form.submit()">
                                @for ($i = date('Y'); $i >= 2021; $i--)
                                    <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </form>
                    </div>
                    <div class="mb-3">
                        <h4>Tổng doanh thu năm {{$year}}: 
                            <span class="{{ $totalRevenue > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $totalRevenue }} VND
                                @if ($totalRevenue > 0)
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            </span>
                        </h4>
                    </div>
                    <hr class="my-5">
                    <h5 class="card-title fw-semibold mb-4 mt-2">Các giao dịch trong năm {{$year}}</h5>
                    <div class="card">
                        <div class="card-body">
                            <!-- Table for displaying revenue data -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mã Giao Dịch</th>
                                        <th scope="col">Mã Ngân Hàng</th>
                                        <th scope="col">Số Tiền</th>
                                        <th scope="col">Người Dùng</th>
                                        <th scope="col">Phim</th>
                                        <th scope="col">Thời Gian Thanh Toán</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Loop through revenue data -->
                                    @foreach($orders as $order)
                                    <tr>
                                        <td scope="row">{{ $order->id }}</td>
                                        <td>{{ $order->vnp_TxnRef }}</td>
                                        <td>{{ $order->vnp_BankCode }}</td>
                                        <td>{{ $order->vnp_Amount }} VND</td>
                                        <td>{{ $order->user->fullname }}</td>
                                        <td>{{ $order->video->title }}</td>
                                        <td>{{ $order->vnp_PayDate }}</td>
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
    </div>
</div>

@include('admin.components.footer')
<!-- Modal for success message -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <!-- Modal content -->
</div>

<script>
    // 
</script>
</body>
</html>
