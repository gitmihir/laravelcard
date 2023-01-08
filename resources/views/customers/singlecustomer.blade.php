@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>{{ $customer->emp_first_name }} {{ $customer->emp_last_name }}</h3>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Contact No</th>
                <td>{{ $customer->emp_contact_no }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $customer->emp_email }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->emp_address }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/customers/allcustomers') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
