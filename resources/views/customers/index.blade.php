@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h3>View Customers</h3>
    <table border=1 cellpadding=10 cellspacing=0 >
        <thead>
            <tr>
                <th>Customers Id</th>
                <th>Customers Name</th>
                <th>Customers Email</th>
                <th>Customers Phone</th>
                <th>Customers Address</th>
                <th>Member Status</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($datacustomers as $v)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$v->customers_name}}</td>
            <td>{{$v->customers_email}}</td>
            <td>{{$v->customers_phone}}</td>
            <td>{{$v->customers_address}}</td>
            <td>{{$v->member_status == 1 ? 'Member' : 'Non Member'}}</td>
            <td>
                <form action="{{route('customers.destroy',$v->customers_id)}}" method="post" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <a href="{{route ('customers.edit',$v->customers_id)}}"><b style="color: green;">EDIT</b></a></td>
                    <td ><button style='background-color: red;' type="submit" onclick="return confirm('Yakin Menghapus Data?')"><b>DELETE</b></button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" style="text-align: center; background-color: lightblue;"><a href="{{ route ('customers.create') }}">Create</a></td>
        </tr>
        </tbody>
</body>
</html>
@endsection
