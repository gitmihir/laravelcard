@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12 mt-3">
        <h4>Category Details</h4>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered catwidth">
            <tr>
                <th>Category Name</th>
                <td>{{ $category->category_name }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/category/allcategory') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
