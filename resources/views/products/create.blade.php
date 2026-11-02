<h3>Form Products</h3>
<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td><label>products name:</label></td>
            <td colspan="2"><input type="text" name="products_name"></td>
        </tr>
        <tr>
            <td><label>products categories:</label></td>
            <td colspan="2">
                <select name="categories_id">
                <option value="">--SELECT CATEGORIES--</option>
                @foreach ($datacategories as $category)
                <option value="{{$category->categories_id}}">{{$category->categories_name}}</option>
                @endforeach
        </select>
    </td>
        </tr>
        <tr>
            <td><label>products price:</label></td>
            <td colspan="2"><input type="number" name="products_price"></td>
        </tr>
        <tr>
            <td><label>products stock:</label></td>
            <td colspan="2"><input type="number" name="products_stock"></td>
        </tr>
        <tr>
            <td><label>products image:</label></td>
            <td colspan="2"><input type="file" name="products_image"></td>
        </tr>
        <tr>
            <td><label>products description:</label></td>
            <td colspan="2"><textarea name="products_description"></textarea></td>
        </tr>
        <tr>
            <td><label>products status:</label></td>
            <td><input type="radio" name="products_status" value="available" >Available</td>
            <td><input type="radio" name="products_status" value="unavailable">Unavailable</td>
        </tr>
        <tr>
    <td style="text-align: center;"><button type="submit">Submit</button></td>
    <td colspan="2" style="text-align: center;"><a href="{{route('products.index')}}">Cancel</a></td>
        </tr>
    </table>
</form>