<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Users</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h3>Form Users</h3>
<form action="{{route('users.store')}}" method="post">
    @csrf
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td><label>users name:</label></td>
            <td colspan="2"><input type="text" name="users_name"></td>
        </tr>
        <tr>
            <td><label>users email:</label></td>
            <td colspan="2"><input type="email" name="users_email"></td>
        </tr>
        <tr>
            <td><label>users password:</label></td>
            <td colspan="2"><input type="password" name="users_password"></td>
        </tr>
        <tr>
            <td><label>users role:</label></td>
            <td><input type="radio" name="users_role" value="admin" >Admin</td>
            <td><input type="radio" name="users_role" value="cashier" checked>Cashier</td>
        </tr>
        <tr>
    <td style="text-align: center;"><button type="submit">Submit</button></td>
    <td colspan="2" style="text-align: center;"><a href="{{route('users.index')}}">Cancel</a></td>
        </tr>
    </table>
</form>
</body>
</html>