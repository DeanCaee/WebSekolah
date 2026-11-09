<h3>Form Faisal</h3>
<form action="{{ route('products.update', $dataeditproducts->products_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td><label>Products Name:</label></td>
            <td colspan="2"><input type="text" name="products_name" value="{{ $dataeditproducts->products_name }}"></td>
        </tr>
        <tr>
            <td><label>Products Categories:</label></td>
            <td colspan="2">
                <select name="categories_id">
                    <option value="">--SELECT CATEGORIES--</option>
                    @foreach ($dataeditcategories as $v)
                    <option value="{{ $v->categories_id }}" {{ $v->categories_id == $dataeditproducts->categories_id ? 'selected' : '' }}>
                        {{ $v->categories_name }}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr> 
        <tr>
            <td><label>Products Price:</label></td>
            <td colspan="2"><input type="number" name="products_price" value="{{ $dataeditproducts->products_price }}"></td>
        </tr>
        <tr>
            <td><label>Products Stock:</label></td>
            <td colspan="2"><input type="number" name="products_stock" value="{{ $dataeditproducts->products_stock }}"></td>
        </tr>
        <tr>
            <td><label>Products Image:</label></td>
            <td colspan="2">
                <input type="file" name="products_image">
                @if (!empty($dataeditproducts->products_image))
                <p class="mt-2">    
                    <img src="{{ asset('storage/' . $dataeditproducts->products_image) }}" width="100px" height="100px">
                </p>    
                @endif
            </td>
        </tr>
        <tr>
            <td><label>Products Description:</label></td>
            <td colspan="2"><textarea name="products_description">{{ $dataeditproducts->products_description }}</textarea></td>
        </tr>
        <tr>
            <td><label>Products Status:</label></td>
            <td><input type="radio" name="products_status" value="available" {{ $dataeditproducts->products_status == 'available' ? 'checked' : '' }}> Available</td>
            <td><input type="radio" name="products_status" value="unavailable" {{ $dataeditproducts->products_status == 'unavailable' ? 'checked' : '' }}> Unavailable</td>
        </tr>
        <tr>
            <td style="text-align: center;"><button type="submit">Submit</button></td>
            <td colspan="2" style="text-align: center;"><a href="{{ route('products.index') }}">Cancel</a></td>
        </tr>
    </table>
</form>