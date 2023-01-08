@include('layout.partials.head')
<form action="{{ url('update-employee/' . $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Customer
            </h3>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="emp_first_name" value="{{ $employee->emp_first_name }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="emp_last_name" value="{{ $employee->emp_last_name }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="emp_email" value="{{ $employee->emp_email }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Contact No.</label>
                <input type="text" name="emp_contact_no" value="{{ $employee->emp_contact_no }}"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="emp_address" value="{{ $employee->emp_address }}" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="emp_user_id">
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ url('/customers/allcustomers') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
