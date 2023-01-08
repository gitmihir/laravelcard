@include('layout.partials.head')
<form action="/submitsubcategory" method="POST">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Add New Sub Category</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="subcategory_name">Sub-category Name</label>
                <input type="text" name="subcategory_name" class="form-control" id="subcategory_name" required>
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="subcategory_added_by">
            <input type="submit" class="btn btn-primary">
            <a href="{{ url('/subcategory/allsubcategory') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
