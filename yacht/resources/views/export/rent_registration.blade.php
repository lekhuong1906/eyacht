<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Rent Registration Code</th>
        <th>Rent Registration Code</th>
        <th>Yacht name</th>
        {{--<th>User</th>--}}
        <th>Service</th>
        <th>Customer</th>
        <th>Rental date</th>
        <th>Rental hours</th>
    </tr>
    </thead>
    <tbody>
    @foreach($all_rent as $all_rent)
        <tr>
            <th>{{$all_rent->id}}</th>
            <td>{{$all_rent->rent_registration_name}}</td>
            <td>{{$all_rent->rent_registration_code}}</td>
            <td>{{$all_rent->yachts->yacht_name}}</td>
            {{--<td>{{$all_rent->users->user_name}}</td>--}}
            <td>{{$all_rent->services->service_name}}</td>
            <td>{{$all_rent->customers->customer_name}}</td>
            <td>{{$all_rent->rental_date}}</td>
            <td>{{$all_rent->rental_hours}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
