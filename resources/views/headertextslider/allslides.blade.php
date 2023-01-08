@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Slide Texts</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/headertextslider/addslide') }}" class="btn btn-primary btn-sm">Add Slide Text</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewslide as $slidedata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $slidedata->sg_text_line }}</td>
                        <td>
                            <a href="{{ url('view-slide/' . $slidedata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-slide/' . $slidedata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-slide/' . $slidedata->id) }}'
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
