@include('layout.partials.head')
<form action="{{ url('update-pc/' . $PC->id) }}" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Payment Credentials
            </h3>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_pc_public_key">Public Key</label>
                <input id="sg_pc_public_key" name="sg_pc_public_key" value="{{ $PC->sg_pc_public_key }}" type="text"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_pc_secret_key">Secret Key</label>
                <input id="sg_pc_secret_key" name="sg_pc_secret_key" value="{{ $PC->sg_pc_secret_key }}" type="text"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_pc_status">Status</label>
                <div>
                    <?php
                    if ($PC->sg_pc_status == '0') {
                        ?>
                    <input name="sg_pc_status" checked value="0" type="radio">On
                    <input name="sg_pc_status" value="1" type="radio">Off
                    <?php  
                    } else if($PC->sg_pc_status == '1') {
                        ?>
                    <input name="sg_pc_status" value="0" type="radio">On
                    <input name="sg_pc_status" checked value="1" type="radio">Off
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/paymentcredentials/pcdetails') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
