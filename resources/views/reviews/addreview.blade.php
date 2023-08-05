@include('layout.partials.head')
<form action="/createreview" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Review
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_review_title">Title</label>
                <input id="sg_review_title" name="sg_review_title" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_review_image">Image</label>
                <input id="sg_review_image" name="sg_review_image" onchange="validateImageSize(this);"
                    accept="image/png, image/jpeg" type="file" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_review_text">Text</label>
                <textarea id="sg_review_text" name="sg_review_text" required="required" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/reviews/allreviews') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
