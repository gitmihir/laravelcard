@include('layout.partials.head')
<form action="{{ url('update-review/' . $review->id) }}" enctype="multipart/form-data" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Review Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_review_title">Name</label>
                <input id="sg_review_title" name="sg_review_title" value="{{ $review->sg_review_title }}" type="text"
                    required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_review_image">Image</label>
                <input id="sg_review_image" name="sg_review_image" type="file" class="form-control">
            </div>
            <div>
                <img src="{{ asset('images/reviewimages/' . $review->sg_review_image) }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_review_text">Text</label>
                <textarea id="sg_review_text" name="sg_review_text" required="required" class="form-control">{{ $review->sg_review_text }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/reviews/allreviews') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
