<?php
use Carbon\Carbon;
?>
@extends('layouts.web')

@section('title', 'Lịch sử giao dịch')

@section('content')
<!-- Blog Details Section Begin -->
<section class="login spad container" style="min-height: 73vh">
    <div class="text-white text-center">
        <h4 class="font-weight-bold">Lịch Sử Giao Dịch</h4>
        <br>
    </div>
    <div class="blog__details__title">
        <h6>
            {{$now}}
        </h6>
    </div>
    <div class="rounded-lg">
        <div class="row bg-white p-2 m-1" style="border-radius: 6px">
            <div class="col-lg-12">
                <div class="blog__details__content">
                    <div class="table-responsive">
                        <table class="table bg-white">
                            <thead>
                            <tr style="font-size: 14px">
                                <th scope="col">#</th>
                                <th scope="col">Mã giao dịch</th>
                                <th scope="col">Video</th>
                                <th scope="col">Hình thức thanh toán</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Giờ</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                            <tr style="font-size: 14px">
                                    <td scope="row">{{$index++}}</td>
                                    <td width="130px">{{$row->vnp_TxnRef}}</td>
                                    <td width="130px"><a
                                            class="text-info fs-6 text-decoration-none font-weight-bold"
                                            href="{{route('video.details', ['v' => $row->href])}}">Xem tại đây</a></td>
                                    <td>NGÂN HÀNG {{$row->vnp_BankCode}}</td>
                                    <td>
                                    <?php
                                            $dt = Carbon::parse($row->vnp_PayDate);
                                            echo $dt->format('d/m/Y');
                                        ?>                                    </td>
                                    <td>
                                        <?php
                                            $dt = Carbon::parse($row->vnp_PayDate);
                                            echo $dt->format('H:i:s');
                                        ?>
                                    </td>
                                    <td>
                                        {{$row->vnp_Amount}}
                                    </td>
                                    <td width="140px"><c:choose>
                                        @if($row->vnp_ResponseCode == '00')
											<span class="text-success font-weight-bold">Thành công</span>
                                        @else
                                            <span class="text-danger font-weight-bold">Thất bại</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        {{ $data->links('vendor.pagination.custom-pagination') }}
    </div>
</section>
<!-- Blog Details Section End -->
@endsection