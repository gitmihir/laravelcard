@include('layout.partials.head')
<form action="/createcms" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add CMS Detail
            </h3>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_home_video">Home Video</label>
                <input type="file" class="form-control" name="sg_cms_home_video" id="sg_cms_home_video">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_tag_line">Home Video Tagline</label>
                <input type="text" class="form-control" name="sg_cms_tag_line" id="sg_cms_tag_line">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_popup_image">Home Popup Image</label>
                <input type="file" onchange="validateImageSize(this);" class="form-control"
                    accept="image/png, image/jpeg" name="sg_cms_popup_image" id="sg_cms_popup_image">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_header_image">Home Header Image</label>
                <input type="file" onchange="validateImageSize(this);" class="form-control"
                    accept="image/png, image/jpeg" name="sg_cms_header_image" id="sg_cms_header_image">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Tearms & Condition</label>
                <textarea class="form-control" name="sg_cms_termscondition" id="sg_cms_termsconditions"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Privacy Policy</label>
                <textarea class="form-control" name="sg_cms_privacy_policy" id="sg_cms_privacy_policy"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Payment Policy</label>
                <textarea class="form-control" name="sg_cms_payment_policy" id="sg_cms_payment_policy"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Cookies Policy</label>
                <textarea class="form-control" name="sg_cms_cookies_policy" id="sg_cms_cookies_policy"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Copyright Line</label>
                <textarea class="form-control" name="sg_cms_copyright_line" id="sg_cms_copyright_line"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/cms/cmsdetails') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
