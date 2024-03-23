<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>{{$data['title']}}</title>
    <style>
        body {
        margin: 0;
        padding: 0;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: #333;
        background-color: #fff;
        }

        .container {
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
        padding: 0 0px;
        padding-bottom: 10px;
        border-radius: 5px;
        line-height: 1.8;
        }

        .header {
        border-bottom: 1px solid #eee;
        }

        .header a {
        font-size: 1.4em;
        color: #000;
        text-decoration: none;
        font-weight: 600;
        }

        .content {
        min-width: 700px;
        overflow: auto;
        line-height: 2;
        }

        .otp {
        margin: 0 auto;
        width: max-content;
        padding: 0 10px;
        color: red;
        border-radius: 4px;
        }

        .footer {
        color: #aaa;
        font-size: 0.8em;
        line-height: 1;
        font-weight: 300;
        }

        .email-info {
        color: #666666;
        font-weight: 400;
        font-size: 13px;
        line-height: 18px;
        padding-bottom: 6px;
        }

        .email-info a {
        text-decoration: none;
        color: #00bc69;
        }
    </style>
</head>

<body>
  <div class="container">
    <br />
    <strong>Xin chào {{$data['name']}},</strong>
    <p>
        Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.
        <br>Vì mục đích bảo mật, 
        vui lòng xác minh danh tính của bạn bằng cách nhập mã OTP sau đây.
      <br />
      <b>Mã xác thực OTP của bạn là: </b>
    </p>
    <h2 class="otp">{{$data['otp']}}</h2>
    <p style="font-size: 0.9em">
      <strong>Mã OTP có hiệu lực trong 3 phút.</strong>
      <br />
      <br />
      <strong>Không chuyển tiếp và đưa mã này cho bất cứ ai.</strong>
    </p>
    <hr style="border: none; border-top: 0.5px solid #131111" />
</div>
</body>
</html>