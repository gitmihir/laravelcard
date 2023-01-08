@include('layout.partials.head')
<form action="/creatvideo" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Video
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_p_video_title">Title</label>
                <input id="sg_p_video_title" name="sg_p_video_title" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_p_video_text">Text</label>
                <textarea id="sg_p_video_text" name="sg_p_video_text" required="required" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_p_video_link">Video</label>
                <input id="sg_p_video_link" name="sg_p_video_link" type="file" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/webvideos/allvideos') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
