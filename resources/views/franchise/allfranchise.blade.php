@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Franchise</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/franchise/addfranchise') }}" class="btn btn-primary btn-sm">Add Franchise</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewfranchise as $franchisedata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $franchisedata->sg_franchise_name }}</td>
                        <td>{{ $franchisedata->sg_franchise_contact_number }}</td>
                        <td>{{ $franchisedata->sg_franchise_email }}</td>
                        <td>
                            <a href="{{ url('view-franchise/' . $franchisedata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-franchise/' . $franchisedata->id) }}"
                                class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-franchise/' . $franchisedata->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal"
                                data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <a href="{{ url('view-franchise-orders/' . $franchisedata->id) }}"
                                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@include('layout.partials.footer')
