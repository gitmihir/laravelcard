@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Customers</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/customers/addcustomer') }}" class="btn btn-primary btn-sm">Add Customer</a>
    </div>
    <div class="col-md-12 mt-3">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($emp as $user)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $user->emp_first_name }}</td>
                        <td>{{ $user->emp_last_name }}</td>
                        <td>{{ $user->emp_contact_no }}</td>
                        <td>{{ $user->emp_email }}</td>
                        <td>
                            <a href="{{ url('view-employee/' . $user->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-employee/' . $user->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-customer/' . $user->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal"
                                data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.partials.footer')
