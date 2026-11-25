<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h3>View Transactions</h3>
    <table border=1 cellpadding=10 cellspacing=0 >
        <thead>
            <tr>
                <th>No</th>
                <th>Transactions Code</th>
                <th>Customers</th>
                <th>Cashier</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($datatransactions as $v)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$v->transactions_code}}</td>
            <td>{{$v->customers->customers_name ?? '-'}}</td>
            <td>{{$v->users->users_name ?? '-'}}</td>
            <td>{{number_format($v->total_amount, 0,',','.')}}</td>
            <td>{{$v->status}}</td>
            <td>{{$v->transactions_date}}
            <td>
                <form action="{{route('transactions.destroy',$v->transactions_id)}}" method="post" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <a href="{{route ('transactions.edit',$v->transactions_id)}}"><b style="color: green;">EDIT</b></a></td>
                    <td ><button style='background-color: red;' type="submit" onclick="return confirm('Yakin Menghapus Data?')"><b>DELETE</b></button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" style="text-align: center;"><a href="{{ route ('transactions.create') }}">Create</a></td>
        </tr>
        </tbody>
    </table>
</body>
</html>
