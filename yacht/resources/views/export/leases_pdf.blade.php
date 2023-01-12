<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Leases</title>
    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size: 18px;
            margin: 1cm 1.5cm 1.5cm 1.5cm;
        }

        .center{
           text-align: center;
        }
        .right{
            text-align: right;
        }
        .div-right{
            float: right;
            text-align: center;
        }
        .div-left{
            float: left;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="center ">
    <b>Cộng hòa xã hội chủ nghĩa Việt Nam</b><br>
    <b><u><i>Độc lập - Tự Do - Hạnh phúc</i></u></b>
</div>
<div class="right">
    <p><i>Tp.Hồ Chí Minh, ngày ... tháng ... năm ... </i></p>
</div>
<div class="center">
    <h2>HỢP ĐỒNG THUÊ DU THUYỀN</h2>
</div>

<div class="left">
    <p>
        <b>Bên A</b><br>
        Dịch vụ cho thuê du thuyền E-Yacht<br>
        Địa chỉ: 12 Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh<br>
        Người đại diện: Nguyễn Văn A<br>
        Số điện thoại: 0156745124<br>
    </p>
    <p>
        <b>Bên B</b><br>
        Khách hàng: {{$leases->rent_registrations->customers->customer_name}} <br>
        Số CCCD: {{$leases->rent_registrations->customers->customer_card}} <br>
        Số điện thoại: {{$leases->rent_registrations->customers->customer_phone}} <br>
    </p>
    <p>
        <b>Nội dung hợp đồng:</b><br>
        Bên A đồng ý cho bên B thuê du thuyền với nội dung như sau:<br>
        + Mã hợp đồng: {{$leases->leases_code}}<br>
        + Mã đăng ký: {{$leases->rent_registrations->rent_registration_code}}<br>
        + Loại du thuyền: {{$leases->rent_registrations->yachts->yacht_name}}<br>
        + Giá cho thuê du thuyền: {{$leases->rent_registrations->yachts->yacht_price.'$'}}<br>
        + Bến đậu du thuyền: {{$leases->rent_registrations->yachts->histories->marinas->marina_name}}<br>
        + Tour: {{$leases->rent_registrations->tours->tour_name}}<br>
        + Giá tour: {{$leases->rent_registrations->tours->tour_price .'$'}}<br>
        + Dịch vụ kèm theo: {{$leases->rent_registrations->services->service_name}}<br>
        + Giá dịch vụ: {{$leases->rent_registrations->services->service_price}}<br>
        + Ngày thuê: {{$leases->rent_registrations->rental_date}}<br>
        + Số giờ thuê: {{$leases->rent_registrations->rental_hours}}<br>
        + Tống giá hóa đơn hợp đồng: {{$leases->leases_price.'$'}}<br>
    </p>
</div>
<div class="">
    <p class="div-left">Đại điện bên A</p>
    <p class="div-right">Đại diện bên B</p>
</div>
</body>
</html>
