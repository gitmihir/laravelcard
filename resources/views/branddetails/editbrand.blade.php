@include('layout.partials.head')
<form action="{{ url('update-brand/' . $brand->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Brand Details
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_logo">Logo</label>
                <input id="sg_brand_logo" onchange="validateImageSize(this);" name="sg_brand_logo" type="file"
                    accept="image/png, image/jpeg" class="form-control">
            </div>
            <div class="brandlogoimages">
                <img src="{{ asset('images/brandimages/' . $brand->sg_brand_logo) }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_favicon_icon">Favicon</label>
                <input id="sg_favicon_icon" onchange="validateImageSize(this);" name="sg_favicon_icon" type="file"
                    accept="image/png, image/jpeg" class="form-control">
            </div>
            <div class="brandlogoimages">
                <img src="{{ asset('images/brandimages/' . $brand->sg_favicon_icon) }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_tagline">Tagline</label>
                <input id="sg_brand_tagline" name="sg_brand_tagline" value="{{ $brand->sg_brand_tagline }}"
                    type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_business_name">Business Name</label>
                <input id="sg_brand_business_name" name="sg_brand_business_name"
                    value="{{ $brand->sg_brand_business_name }}" type="text" class="form-control"
                    required="required">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_gstin">GSTIN</label>
                <input id="sg_gstin" name="sg_gstin" value="{{ $brand->sg_gstin }}" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group"> --}}
        {{-- <label for="sg_gstin_tax">GST %</label> --}}
        <input id="sg_gstin_tax" name="sg_gstin_tax" value="{{ $brand->sg_gstin_tax }}" type="hidden"
            class="form-control">
        {{-- </div>
        </div> --}}


        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_business_logo">Business Logo</label>
                <input id="sg_brand_business_logo" name="sg_brand_business_logo" onchange="validateImageSize(this);"
                    type="file" accept="image/png, image/jpeg" class="form-control">
            </div>
            <div class="brandlogoimages">
                <img src="{{ asset('images/brandimages/' . $brand->sg_brand_business_logo) }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_business_address">Business Address</label>
                <textarea id="sg_brand_business_address" name="sg_brand_business_address" class="form-control" required="required">{{ $brand->sg_brand_business_address }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_business_email">Business Email</label>
                <input id="sg_brand_business_email" name="sg_brand_business_email"
                    value="{{ $brand->sg_brand_business_email }}" type="email" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_busienss_phone">Business Phone</label>
                <input id="sg_brand_busienss_phone" name="sg_brand_busienss_phone"
                    value="{{ $brand->sg_brand_busienss_phone }}" type="text" class="form-control"
                    required="required">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_tandc_line">Business T&C line</label>
                <textarea id="sg_brand_tandc_line" name="sg_brand_tandc_line" class="form-control">{{ $brand->sg_brand_tandc_line }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_brand_upload_limit">Upload Limit</label>
                <input id="sg_brand_upload_limit" name="sg_brand_upload_limit"
                    value="{{ $brand->sg_brand_upload_limit }}" type="number" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/branddetails/branddetail') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
