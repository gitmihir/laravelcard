@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Clients</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/clients/addclient') }}" class="btn btn-primary btn-sm">Add Client</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewclient as $clientdata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $clientdata->sg_client_name }}</td>
                        <td><a href="{{ asset('images/clientimages/' . $clientdata->sg_client_logo) }}"
                                download="">Download Image</a></td>
                        <td>
                            <a href="{{ url('view-client/' . $clientdata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-client/' . $clientdata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-client/' . $clientdata->id) }}'
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
