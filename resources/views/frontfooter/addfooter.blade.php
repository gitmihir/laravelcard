@include('layout.partials.head')
<form action="/createfrontfooter" method="POST" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Front Footer Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_driver">Facebook</label>
                <input id="sg_smtp_driver" name="sg_footer_fb_link" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_host">Instagram</label>
                <input id="sg_smtp_host" name="sg_footer_inst_link" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_port">Twitter</label>
                <input id="sg_smtp_port" name="sg_footer_tw_link" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_username">LinkedIn</label>
                <input id="sg_smtp_username" name="sg_footer_lk_link" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_password">Pinterest</label>
                <input id="sg_smtp_password" name="sg_footer_pt_link" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_encryption">Call</label>
                <input id="sg_smtp_encryption" name="sg_footer_call_link" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_encryption">WhatsApp</label>
                <input id="sg_smtp_encryption" name="sg_footer_whatsapp_link" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_smtp_encryption">Email</label>
                <input id="sg_smtp_encryption" name="sg_footer_email" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/frontfooter/footerdetails') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
