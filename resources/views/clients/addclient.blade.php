@include('layout.partials.head')
<form action="/createclient" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Client
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_client_name">Name</label>
                <input id="sg_client_name" name="sg_client_name" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_client_logo">Logo</label>
                <input id="sg_client_logo" name="sg_client_logo" onchange="validateImageSize(this);" type="file"
                    accept="image/png, image/jpeg" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/clients/allclients') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
