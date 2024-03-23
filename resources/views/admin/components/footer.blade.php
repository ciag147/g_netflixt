<!-- <div style="background-color: blue; height: 100px;">
    <h2>Day la footer ADMIN</h2>
</div> -->
<div class="col-lg-12">
    <p class="text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;
        <script>
            document.write(new Date().getFullYear());
        </script>
        <br>
        <br>
        All rights reserved | Design and Developed by Ciag
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('ad/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('ad/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('ad/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('ad/js/app.min.js') }}"></script>
<script src="{{ asset('ad/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('ad/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('ad/js/dashboard.js') }}"></script>
<script src="{{ asset('ad/js/validateAdmin.js') }}"></script>

{{-- Check if loginAdmin session variable exists --}}
@php
    $loginAdmin = session('loginAdmin');
    if ($loginAdmin !== null) {
        if ($loginAdmin) {
@endphp
            <script>
                showSwalAlert('success', 'Đăng nhập thành công !');
            </script>
@php
        } else {
@endphp
            <script>
                showSwalAlert('error', 'Sai thông tin đăng nhập !');
            </script>
@php
        }
        session()->forget('loginAdmin');
    }
@endphp

{{-- Check if loginAdminFail session variable exists --}}
@php
    $loginAdminFail = session('loginAdminFail');
    if ($loginAdminFail !== null) {
        if ($loginAdminFail) {
@endphp
            <script>
                showSwalAlert('warning', 'Tài khoản không hoạt động !');
            </script>
@php
        }
        session()->forget('loginAdminFail');
    }
@endphp