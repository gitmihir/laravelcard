@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Suppliers</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/supplier/addsupplier') }}" class="btn btn-primary btn-sm">Add Supplier</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Supplier Name</th>
                    <th>Supplier Company</th>
                    <th>Supplier Contact Number</th>
                    <th>Supplier Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewsupplier as $supplierdata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $supplierdata->supplier_name }}</td>
                        <td>{{ $supplierdata->supplier_company }}</td>
                        <td>{{ $supplierdata->supplier_contact_number }}</td>
                        <td>{{ $supplierdata->supplier_email }}</td>
                        <td>
                            <a href="{{ url('view-supplier/' . $supplierdata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-supplier/' . $supplierdata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-supplier/' . $supplierdata->id) }}'
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
