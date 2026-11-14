@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h3>View Categories</h3>
    <table border=1 cellpadding=10 cellspacing=0 >
        <thead>
            <tr>
                <th>No</th>
                <th>Categories Name</th>
                <th>Categories Descriptions</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody style=" background-color: lightblue;">
        @foreach ($datacategories as $v)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$v->categories_name}}</td>
            <td>{{$v->categories_descriptions}}</td>
            <td>
                <form action="{{route('categories.destroy',$v->categories_id)}}" method="post" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <a href="{{route ('categories.edit',$v->categories_id)}}"><b style="color: green;">EDIT</b></a></td>
                    <td ><button style='background-color: red;' type="submit" onclick="return confirm('Yakin Menghapus Data?')"><b>DELETE</b></button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" style="text-align: center;"><a href="{{route('categories.create')}}">Create</a></td>
        </tr>
        </tbody>
</body>
</html>
@endsection
