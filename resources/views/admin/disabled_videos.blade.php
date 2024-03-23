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
                    <h5 class="card-title fw-semibold mb-4 mt-2">Danh Sách Video
                        Ngưng Công Chiếu</h5>
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
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $index => $video)
                                        @if($video->isActive == 0)
                                            <tr>
                                                <td scope="row">{{ $index + 1 }}</td>
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
                                                        <form id="RestoreFormDisabled" action="{{ route('admin.video.restore') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $video->id }}">
                                                            <button type="submit" class="btn btn-primary ms-2 rounded-2" style="width: 100px;">Khôi phục</button>
                                                        </form>                                   
                                                        <a href="{{ route('admin.video.edit', ['id' => $video->id]) }}" class="btn btn-danger ms-2 rounded-2">Sửa</a>                                               
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalLiveDemo{{ $index }}" class="btn btn-success ms-2 rounded-2">Xem</button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalLiveDemo{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <iframe id="player" width="100%" height="600" src="https://www.youtube.com/embed/{{ $video->id }}" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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

@if(session('restoreVideoSuccess'))
    <script>
        showSwalAlert('success', 'Khôi phục video thành công');
    </script>
@endif

</body>
</html>
