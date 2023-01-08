@include('layout.partials.head')
<form action="/createsmtp" method="POST" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add SMTP Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_driver">Driver</label>
                <input id="sg_smtp_driver" name="sg_smtp_driver" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_host">Host</label>
                <input id="sg_smtp_host" name="sg_smtp_host" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_port">Port</label>
                <input id="sg_smtp_port" name="sg_smtp_port" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_username">User Name</label>
                <input id="sg_smtp_username" name="sg_smtp_username" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_password">Password</label>
                <input id="sg_smtp_password" name="sg_smtp_password" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_encryption">Encryption</label>
                <input id="sg_smtp_encryption" name="sg_smtp_encryption" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_from_address">From Address</label>
                <input id="sg_smtp_from_address" name="sg_smtp_from_address" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_from_name">From Name</label>
                <input id="sg_smtp_from_name" name="sg_smtp_from_name" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/smtp/smtpdetails') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
