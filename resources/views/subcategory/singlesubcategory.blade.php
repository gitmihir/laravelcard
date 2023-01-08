@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12 mt-3">
        <h4>Sub Category Details</h4>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered catwidth">
            <tr>
                <th>Sub Category Name</th>
                <td>{{ $subcategory->subcategory_name }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/subcategory/allsubcategory') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
