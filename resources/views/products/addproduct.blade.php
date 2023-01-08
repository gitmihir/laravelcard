@include('layout.partials.head')
<form action="/submitproduct" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Add New Product</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="product_name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_type">Product Type</label>
                <input type="text" name="product_type" class="form-control" id="product_type" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="product_ID">Product Category</label>
            <select class="form-control" name="product_category">
                <option value="">Select Category</option>
                @foreach ($categoryquery as $catname)
                    <option value="{{ $catname->category_id }}">{{ $catname->category_name }}</option>
                @endforeach
            </select>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="product_list_price">Price</label>
                <input type="text" name="product_list_price" class="form-control" id="product_list_price" required>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Display Picture</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Display Picture 1</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image1" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Display Picture 2</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image2" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <input type="submit" class="btn btn-primary">
            <a href="{{ url('/products/allproducts') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
