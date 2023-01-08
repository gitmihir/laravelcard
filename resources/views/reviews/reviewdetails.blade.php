@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Review Details
        </h3>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Title</th>
                <td>{{ $viewreviewindetail->sg_review_title }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('images/reviewimages/' . $viewreviewindetail->sg_review_image) }}">
                </td>
            </tr>
            <tr>
                <th>Text</th>
                <td>{{ $viewreviewindetail->sg_review_text }}</td>
            </tr>

        </table>
        <a href="{{ url('/reviews/allreviews') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
