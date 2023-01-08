@include('layout.partials.head')
<form action="/createowner" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Owner
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_owner_title">Name</label>
                <input id="sg_owner_title" name="sg_owner_title" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_owner_image">Image</label>
                <input id="sg_owner_image" name="sg_owner_image" type="file" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_owner_text">Text</label>
                <textarea id="sg_owner_text" name="sg_owner_text" required="required" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/owner/allowners') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
