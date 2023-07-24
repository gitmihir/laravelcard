@include('layout.partials.head')
@php
    $categoryqueryinproduct = DB::select('select * from category where category_id =' . $product->product_category);
@endphp
<form action="{{ url('update-product/' . $product->product_main_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Update Product</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"
                    id="product_name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_type">Product Type</label>
                <input type="text" name="product_type" value="{{ $product->product_type }}" class="form-control"
                    id="product_type">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="product_category">Category</label>
                <select class="form-control" id="product_category" name="product_category">
                    @foreach ($categoryqueryinproduct as $categoryname)
                        <option value="{{ $categoryname->category_id }}">{{ $categoryname->category_name }}</option>
                    @endforeach
                    @foreach ($categoryquery as $categorynameall)
                        <option value="{{ $categorynameall->category_id }}">{{ $categorynameall->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="product_list_price">List Price</label>
                <input type="text" name="product_list_price" value="{{ $product->product_list_price }}"
                    class="form-control" id="product_list_price">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Picture</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 productimg">
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('images/productimages/' . $product->image) }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Picture 1</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image1" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 productimg">
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('images/productimages/' . $product->image1) }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Picture 2</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image2" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 productimg">
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('images/productimages/' . $product->image2) }}">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="product_hsnsac">HSN / SAC</label>
                <input type="text" name="product_hsnsac" value="{{ $product->product_hsnsac }}" class="form-control"
                    id="product_hsnsac">
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="product_added_by">
            <input type="submit" value="Update" class="btn btn-primary">
            <a href="{{ url('/products/allproducts') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
