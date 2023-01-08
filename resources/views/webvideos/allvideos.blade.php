@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Videos</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/webvideos/addvideo') }}" class="btn btn-primary btn-sm">Add Video</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Video</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewvideo as $videodata)
                    <tr>
                        <td>{{ $i }}</td>

                        <td>{{ $videodata->sg_p_video_title }}</td>
                        <td>{{ $videodata->sg_p_video_text }}</td>
                        <td><a href="{{ asset('websitevideos/' . $videodata->sg_p_video_link) }}" download="">Download
                                Video</a></td>
                        <td>
                            <a href="{{ url('view-video/' . $videodata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-video/' . $videodata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-video/' . $videodata->id) }}'
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
