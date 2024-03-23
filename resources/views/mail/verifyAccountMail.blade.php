<html>
<head>
    <title>Verification Mail</title>
</head>
<body>
    <p>
        Chào mừng {{Session()->get('activate-success')}} đã đăng ký thành viên tại Movie W3b. Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
        </br>
        <a href="{{ $user->activation_link }}">Bấm vào đây để kích hoạt tài khoản</a>
    </p>
</body>
</html>