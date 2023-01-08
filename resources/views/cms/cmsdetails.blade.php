@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            CMS Details
        </h3>
    </div>
    <div class="col-md-12">
        @foreach ($viewcms as $cmsdata)
            <div class="col-md-12">
                <label>Home Video</label>
                <div>{{ $cmsdata->sg_cms_home_video }}</div>
            </div>
            <div class="col-md-12">
                <label>Video Tagline</label>
                <div>{{ $cmsdata->sg_cms_tag_line }}</div>
            </div>
            <div class="col-md-12">
                <label>Popup Image</label>
                <div class="backendimage">
                    <img src="{{ asset('images/popupimage/' . $cmsdata->sg_cms_popup_image) }}">
                </div>
            </div>
            <div class="col-md-12">
                <label for="sg_cms_header_image">Home Header Image</label>
                <div class="backendimage">
                    <img src="{{ asset('images/headerimage/' . $cmsdata->sg_cms_header_image) }}">
                </div>
            </div>
            <div class="col-md-12">
                <label>Tearms & Condition</label>
                <div>{{ $cmsdata->sg_cms_termscondition }}</div>
            </div>
            <div class="col-md-12">
                <label>Privacy Policy</label>
                <div>{{ $cmsdata->sg_cms_privacy_policy }}</div>
            </div>
            <div class="col-md-12">
                <label>Payment Policy</label>
                <div>{{ $cmsdata->sg_cms_payment_policy }}</div>
            </div>
            <div class="col-md-12">
                <label>Cookies Policy</label>
                <div>{{ $cmsdata->sg_cms_cookies_policy }}</div>
            </div>
            <div class="col-md-12">
                <label>Copyright Line</label>
                <div>{{ $cmsdata->sg_cms_copyright_line }}</div>
            </div>
            <a href="{{ url('edit-cms/' . $cmsdata->id) }}" class="btn btn-primary btn-sm">Update CMS</a>
        @endforeach
    </div>
</div>
@include('layout.partials.footer')
