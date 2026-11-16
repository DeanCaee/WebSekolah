<h3>Form Customers</h3>
<form action="{{route('users.update', $dataeditusers->users_id)}}" method="post">
    @csrf
    @method("PUT")
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td><label>users name:</label></td>
            <td colspan="2"><input type="text" name="users_name" value="{{$dataeditusers->users_name}}"></td>
        </tr>
        <tr>
            <td><label>users email:</label></td>
            <td colspan="2"><input type="email" name="users_email" value="{{$dataeditusers->users_email}}"></td>
        </tr>
        <tr>
            <td><label>users password:</label></td>
            <td colspan="2"><input type="password" name="users_password" value="{{$dataeditusers->users_password}}"></td>
        </tr>
        <tr>
            <td><label>users role:</label></td>
            <td><input type="radio" name="users_role" value="admin" {{ ($dataeditusers->users_role) == 'admin'? 'checked' : '' }}>Admin</td>
            <td><input type="radio" name="users_role" value="cashier" {{ ($dataeditusers->users_role) == 'cashier' ? 'checked' : '' }}>Cashier</td>
        </tr>
        <tr>
    <td style="text-align: center;"><button type="submit">Save</button></td>
    <td colspan="2" style="text-align: center;"><a href="{{route('users.index')}}">Cancel</a></td>
        </tr>
    </table>
</form>