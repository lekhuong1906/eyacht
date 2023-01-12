<div class="div">
    <h2>Mail xác nhận thông tin</h2>
    <p>Hợp đồng của bạn đã được xác nhận đăng kí thành công<br>
        Mã hợp đồng:{{$data['leases_code']}}<br>
        Vui lòng tiến hành thanh toán qua link sau:
    </p>
    <a href="{{URL::to('/checkout/'.$data['id'])}}">CheckOut</a>
    {{--@component('mail::button',['url'=>$url,'color'=>'success'])
        Payment
    @endcomponent--}}
</div>
