@include('layout.partials.head')
<form action="/submitcategory" method="POST">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Add New Category</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="category_name" required>
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="category_added_by">
            <input type="submit" class="btn btn-primary">
            <a href="{{ url('/category/allcategory') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
