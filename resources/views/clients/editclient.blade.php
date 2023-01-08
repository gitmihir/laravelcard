@include('layout.partials.head')
<form action="{{ url('update-client/' . $client->id) }}" enctype="multipart/form-data" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Client Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_client_name">Name</label>
                <input id="sg_client_name" name="sg_client_name" value="{{ $client->sg_client_name }}" type="text"
                    required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_client_logo">Logo</label>
                <input id="sg_client_logo" name="sg_client_logo" type="file" class="form-control">
            </div>
            <div>
                <img src="{{ asset('images/clientimages/' . $client->sg_client_logo) }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/clients/allclients') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
