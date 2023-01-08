@include('layout.partials.head')
<form action="{{ url('update-smtp/' . $smtp->id) }}" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update SMTP Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_driver">Driver</label>
                <input id="sg_smtp_driver" name="sg_smtp_driver" value="{{ $smtp->sg_smtp_driver }}" type="text"
                    required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_host">Host</label>
                <input id="sg_smtp_host" name="sg_smtp_host" value="{{ $smtp->sg_smtp_host }}" type="text"
                    required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_port">Port</label>
                <input id="sg_smtp_port" name="sg_smtp_port" value="{{ $smtp->sg_smtp_port }}" type="text"
                    required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_username">User Name</label>
                <input id="sg_smtp_username" name="sg_smtp_username" value="{{ $smtp->sg_smtp_username }}"
                    type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_password">Password</label>
                <input id="sg_smtp_password" name="sg_smtp_password" value="{{ $smtp->sg_smtp_password }}"
                    type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_encryption">Encryption</label>
                <input id="sg_smtp_encryption" name="sg_smtp_encryption" value="{{ $smtp->sg_smtp_encryption }}"
                    type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_from_address">From Address</label>
                <input id="sg_smtp_from_address" name="sg_smtp_from_address" value="{{ $smtp->sg_smtp_from_address }}"
                    type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_from_name">From Name</label>
                <input id="sg_smtp_from_name" name="sg_smtp_from_name" value="{{ $smtp->sg_smtp_from_name }}"
                    type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/smtp/smtpdetails') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
