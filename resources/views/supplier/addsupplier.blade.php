@include('layout.partials.head')
<form action="/submitsupplier" method="POST">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Add New Supplier</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_name">Supplier Name</label>
                <input type="text" name="supplier_name" class="form-control" id="supplier_name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_company">Supplier Company</label>
                <input type="text" name="supplier_company" class="form-control" id="supplier_company" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_contact_number">Supplier Contact Number</label>
                <input type="text" name="supplier_contact_number" class="form-control" id="supplier_contact_number"
                    required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_email">Supplier Email</label>
                <input type="email" name="supplier_email" class="form-control" id="supplier_email" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_registered_address">Registered Address</label>
                <input type="text" name="supplier_registered_address" class="form-control"
                    id="supplier_registered_address" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_communication_address">Communication Address</label>
                <input type="text" name="supplier_communication_address" class="form-control"
                    id="supplier_communication_address" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier_gst_number">GST Number</label>
                <input type="text" name="supplier_gst_number" class="form-control" id="supplier_gst_number" required>
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="supplier_added_by">
            <input type="submit" class="btn btn-primary">
            <a href="{{ url('/supplier/allsupplier') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
