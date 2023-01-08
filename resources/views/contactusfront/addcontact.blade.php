@include('layout.partials.head')
<form action="/createcontactfr" method="POST" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Contact Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_contact_title">Contact Title</label>
                <input id="sg_contact_title" name="sg_contact_title" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_contact_detail">Contact Detail</label>
                <input id="sg_contact_detail" name="sg_contact_detail" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_contact_email">Contact Email</label>
                <input id="sg_contact_email" name="sg_contact_email" type="email" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_contact_number">Contact Number</label>
                <input id="sg_contact_number" name="sg_contact_number" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/contactusfront/allcontacts') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
