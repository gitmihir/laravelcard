@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Video Details
        </h3>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Title</th>
                <td>{{ $viewvideoindetail->sg_p_video_title }}</td>
            </tr>
            <tr>
                <th>Video</th>
                <td><a href="{{ asset('websitevideos/' . $viewvideoindetail->sg_p_video_link) }}"
                        download="download">Download Video</a>
                </td>
            </tr>
            <tr>
                <th>Text</th>
                <td>{{ $viewvideoindetail->sg_p_video_text }}</td>
            </tr>

        </table>
        <a href="{{ url('/webvideos/allvideos') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
