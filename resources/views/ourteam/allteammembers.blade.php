@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Our Team Members</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/ourteam/addourteam') }}" class="btn btn-primary btn-sm">Add Team Member</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewteam as $teamdata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="{{ asset('images/memberimages/' . $teamdata->sg_our_team_image) }}"
                                download="">Download Image</a></td>
                        <td>{{ $teamdata->sg_our_team_title }}</td>
                        <td>{{ $teamdata->sg_our_team_text }}</td>
                        <td>
                            <a href="{{ url('view-team/' . $teamdata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-team/' . $teamdata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-team/' . $teamdata->id) }}'
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
