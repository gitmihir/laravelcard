@include('layout.partials.head')
<form action="{{ url('update-video/' . $video->id) }}" enctype="multipart/form-data" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Video Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_p_video_title">Name</label>
                <input id="sg_p_video_title" name="sg_p_video_title" value="{{ $video->sg_p_video_title }}"
                    type="text" required="required" class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_p_video_text">Text</label>
                <textarea id="sg_p_video_text" name="sg_p_video_text" required="required" class="form-control">{{ $video->sg_p_video_text }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_p_video_link">Video</label>
                <input id="sg_p_video_link" name="sg_p_video_link" type="file" class="form-control">
            </div>
            <div class="mb-5">
                <video class="videoembed" autoplay muted loop>
                    <source src="{{ asset('websitevideos/' . $video->sg_p_video_link) }}" type="video/mp4" />
                </video>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/webvideos/allvideos') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
