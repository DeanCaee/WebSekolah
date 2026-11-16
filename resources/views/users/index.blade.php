<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Users</title>
</head>
<body>
<h3>View Users</h3>
    <table border=1 cellpadding=10 cellspacing=0 >
        <thead>
            <tr>
                <th>Users Id</th>
                <th>Users Name</th>
                <th>Users Email</th>
                <th>Users Role</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($datausers as $v)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$v->users_name}}</td>
            <td>{{$v->users_email}}</td>
            <td>{{$v->users_role}}</td>
            <td>
                <form action="{{route('users.destroy',$v->users_id)}}" method="post" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <a href="{{route ('users.edit',$v->users_id)}}"><b style="color: green;">EDIT</b></a></td>
                    <td ><button style='background-color: red;' type="submit" onclick="return confirm('Yakin Menghapus Data?')"><b>DELETE</b></button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" style="text-align: center;"><a href="{{ route ('users.create') }}">Create</a></td>
        </tr>
        </tbody>
    </table>    
</body>
</html>