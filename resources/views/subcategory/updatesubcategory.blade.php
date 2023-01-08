@include('layout.partials.head')
<div class="row mb-2">
    <div class="col-md-12">
        <h3>
            Edit Category
        </h3>
        <form action="{{ url('update-subcategory/' . $subcategory->subcategory_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="">Sub Category Name</label>
                <input type="text" name="subcategory_name" value="{{ $subcategory->subcategory_name }}"
                    class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="hidden" value="{{ $id = Auth::id() }}" name="subcategory_added_date">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/subcategory/allsubcategory') }}" type="button" class="btn btn-info">Back</a>
            </div>

        </form>
    </div>
</div>
@include('layout.partials.footer')
