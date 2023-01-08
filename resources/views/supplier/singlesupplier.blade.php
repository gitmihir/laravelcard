@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12 mt-3">
        <h4>Supplier Details</h4>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Supplier Name</th>
                <td>{{ $supplier->supplier_name }}</td>
            </tr>
            <tr>
                <th>Supplier Company</th>
                <td>{{ $supplier->supplier_company }}</td>
            </tr>
            <tr>
                <th>Supplier Contact Number</th>
                <td>{{ $supplier->supplier_contact_number }}</td>
            </tr>
            <tr>
                <th>Supplier Email</th>
                <td>{{ $supplier->supplier_email }}</td>
            </tr>
            <tr>
                <th>Supplier Registered Address</th>
                <td>{{ $supplier->supplier_registered_address }}</td>
            </tr>
            <tr>
                <th>Supplier Communication Address</th>
                <td>{{ $supplier->supplier_communication_address }}</td>
            </tr>
            <tr>
                <th>Supplier GST Number</th>
                <td>{{ $supplier->supplier_gst_number }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/supplier/allsupplier') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
