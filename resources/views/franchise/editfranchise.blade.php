@include('layout.partials.head')
<form action="{{ url('update-franchise/' . $franchise->id) }}" enctype="multipart/form-data" method="POST"
    class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Franchise Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_franchise_name">Franchise Name</label>
                <input id="sg_franchise_name" name="sg_franchise_name" value="{{ $franchise->sg_franchise_name }}"
                    type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_franchise_contact_number">Franchise Contact Number</label>
                <input id="sg_franchise_contact_number" name="sg_franchise_contact_number"
                    value="{{ $franchise->sg_franchise_contact_number }}" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_franchise_email">Franchise Email</label>
                <input id="sg_franchise_email" name="sg_franchise_email" value="{{ $franchise->sg_franchise_email }}"
                    type="email" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_franchise_password">Franchise Password</label>
                <input id="sg_franchise_password" name="sg_franchise_password"
                    value="{{ $franchise->sg_franchise_password }}" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/franchise/allfranchise') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>
@include('layout.partials.footer')
