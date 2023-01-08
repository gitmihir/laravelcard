@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Front Contact Details</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/contactusfront/addcontact') }}" class="btn btn-primary btn-sm">Add Contact</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Contact Title</th>
                    <th>Contact Detail</th>
                    <th>Contact Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewcontactfr as $contactdatafr)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $contactdatafr->sg_contact_title }}</td>
                        <td>{{ $contactdatafr->sg_contact_detail }}</td>
                        <td>{{ $contactdatafr->sg_contact_email }}</td>
                        <td>{{ $contactdatafr->sg_contact_number }}</td>
                        <td>
                            <a href="{{ url('view-contactfr/' . $contactdatafr->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-contactfr/' . $contactdatafr->id) }}"
                                class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-contactfr/' . $contactdatafr->id) }}'
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
