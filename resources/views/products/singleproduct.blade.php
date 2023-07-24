@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>{{ $product->product_name }}</h3>
    </div>
    <div class="col-md-12 productimge">
        <div class="row">
            <div class="col-md-4"><img src="{{ asset('images/productimages/' . $product->image) }}"></div>
            <div class="col-md-4"><img src="{{ asset('images/productimages/' . $product->image1) }}"></div>
            <div class="col-md-4"><img src="{{ asset('images/productimages/' . $product->image2) }}"></div>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <h4>Product Details</h4>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Product Type</th>
                <td>{{ $product->product_type }}</td>
            </tr>
            <tr>
                <th>Product Category</th>
                <td>
                    @php
                        $categoryquery = DB::select('select * from category where category_id =' . $product->product_category);
                    @endphp
                    @foreach ($categoryquery as $categoryname)
                        {{ $categoryname->category_name }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->product_list_price }}</td>
            </tr>
            <tr>
                <th>HSN / SAC</th>
                <td>{{ $product->product_hsnsac }}</td>
            </tr>

        </table>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/products/allproducts') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
