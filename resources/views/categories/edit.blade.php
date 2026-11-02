<h3>Form Categories</h3>
<form action="{{route('categories.update', $dataeditcategories->categories_id)}}" method="POST">
    @csrf
    @method("PUT")
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td><label>Categories Name:</label></td>
            <td><input type="text" name="categories_name" value="{{$dataeditcategories->categories_name}}"></td>
        </tr>
        <tr>
            <td><label>Categories Descriptions:</label></td>
            <td><textarea name="categories_descriptions">{{$dataeditcategories->categories_descriptions}}</textarea></td>
        </tr>
        <tr>
    <td style="text-align: center;"><button type="submit">Submit</button></td>
    <td style="text-align: center;"><a href="{{route('categories.index')}}">Cancel</a></td>
        </tr>
    </table>
</form>
