<h3>Form Customers</h3>
<form action="{{route('customers.update', $dataeditcustomers->customers_id)}}" method="post">
    @csrf
    @method("PUT")
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td><label>customers name:</label></td>
            <td colspan="2"><input type="text" name="customers_name" value="{{$dataeditcustomers->customers_name}}"></td>
        </tr>
        <tr>
            <td><label>customers email:</label></td>
            <td colspan="2"><input type="email" name="customers_email" value="{{$dataeditcustomers->customers_email}}"></td>
        </tr>
        <tr>
            <td><label>customers phone:</label></td>
            <td colspan="2"><input type="number" name="customers_phone" value="{{$dataeditcustomers->customers_phone}}"></td>
        </tr>
        <tr>
            <td><label>customers address:</label></td>
            <td colspan="2"><textarea name="customers_address">{{$dataeditcustomers->customers_address}}</textarea></td>
        </tr>
        <tr>
            <td><label>member status:</label></td>
            <td><input type="radio" name="member_status" value="1" {{ ($dataeditcustomers->member_status) == 1 ? 'checked' : '' }}>Member</td>
            <td><input type="radio" name="member_status" value="0" {{ ($dataeditcustomers->member_status) == 0 ? 'checked' : '' }}>Non Member</td>
        </tr>
        <tr>
    <td style="text-align: center;"><button type="submit">Save</button></td>
    <td colspan="2" style="text-align: center;"><a href="{{route('customers.index')}}">Cancel</a></td>
        </tr>
    </table>
</form>
