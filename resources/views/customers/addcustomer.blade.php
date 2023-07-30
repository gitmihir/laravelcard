@include('layout.partials.head')
<form action="/create" method="POST" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Customer
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="First Name" name="emp_first_name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" name="emp_last_name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" placeholder="Contact No." name="emp_contact_no" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="emp_email" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Address" name="emp_address" required><br>
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="emp_user_id">
            <button type="submit" value="Add student" class="btn btn-primary">Submit</button>
            <a href="{{ url('/customers/allcustomers') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
