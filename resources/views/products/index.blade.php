<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h3>View Products</h3>
    <table border=1 cellpadding=10 cellspacing=0 >
        <thead>
            <tr style="background-color: yellow;">
                <th>Products Id</th>
                <th>Products Name</th>
                <th>Products Categories</th>
                <th>Products Price</th>
                <th>Products Stock</th>
                <th>Products Image</th>
                <th>Products Status</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($dataproducts as $v)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$v->products_name}}</td>
            <td>{{$v->categories_id}}</td>
            <td>{{$v->products_price}}</td>
            <td>{{$v->products_stock}}</td>
            <td>{{$v->products_image}}</td>
            <td>{{$v->products_status}}</td>
            <td>
                <form action="{{route('products.destroy',$v->products_id)}}" method="post" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <a href="{{route ('products.edit',$v->products_id)}}"><b style="color: green;">EDIT</b></a></td>
                    <td ><button style='background-color: red;' type="submit" onclick="return confirm('Yakin Menghapus Data?')"><b>DELETE</b></button>
                </form>
            </td>   
        </tr>
        @endforeach
        <tr>
            <td colspan="9" style="text-align: center; background-color: lightblue;"><a href="{{ route ('products.create') }}">Create</a></td>
        </tr>
        </tbody>
</body>
</html>