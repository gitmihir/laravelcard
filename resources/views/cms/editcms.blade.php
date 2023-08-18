@include('layout.partials.head')
<form action="{{ url('update-cms/' . $cms->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                CMS Details
            </h3>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Video Title</label>
                    <input type="text" id="sg_cms_video_title" class="form-control"
                        value="{{ $cms->sg_cms_video_title }}" name="sg_cms_video_title">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Shipping Rate</label>
                    <input type="text" id="sg_shipping_rate" class="form-control"
                        value="{{ $cms->sg_shipping_rate }}" name="sg_shipping_rate">
                </div>
            </div>

            <div class="form-group">
                <label>Home Video</label>
                <input type="file" id="sg_cms_home_video" class="form-control" name="sg_cms_home_video">
            </div>
            @if ($cms->sg_cms_home_video)
                <div class="backendimage">
                    <video class="videoembed" autoplay muted loop>
                        <source src="{{ asset('videos/' . $cms->sg_cms_home_video) }}" type="video/mp4" />
                    </video>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Video Tagline</label>
                <input type="text" id="sg_cms_tag_line" class="form-control" value="{{ $cms->sg_cms_tag_line }}"
                    name="sg_cms_tag_line">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_popup_image">Popup Image</label>
                <input type="file" onchange="validateImageSize(this);" id="sg_cms_popup_image"
                    accept="image/png, image/jpeg" class="form-control" name="sg_cms_popup_image">
            </div>
            @if ($cms->sg_cms_popup_image)
                <div class="backendimage">
                    <img src="{{ asset('images/popupimage/' . $cms->sg_cms_popup_image) }}">
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_header_image">Header Image</label>
                <input type="file" onchange="validateImageSize(this);" id="sg_cms_header_image"
                    accept="image/png, image/jpeg" class="form-control" name="sg_cms_header_image">
            </div>
            @if ($cms->sg_cms_header_image)
                <div class="backendimage">
                    <img src="{{ asset('images/headerimage/' . $cms->sg_cms_header_image) }}">
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Terms & Condition</label>
                <textarea id="sg_cms_termscondition" class="form-control" name="sg_cms_termscondition">{{ $cms->sg_cms_termscondition }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Privacy Policy</label>
                <textarea id="sg_cms_privacy_policy" class="form-control" name="sg_cms_privacy_policy">{{ $cms->sg_cms_privacy_policy }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_payment_policy">Payment Policy</label>
                <textarea id="sg_cms_payment_policy" class="form-control" name="sg_cms_payment_policy">{{ $cms->sg_cms_payment_policy }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_cookies_policy">Cookies Policy</label>
                <textarea id="sg_cms_cookies_policy" class="form-control" name="sg_cms_cookies_policy">{{ $cms->sg_cms_cookies_policy }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_copyright_line">Copyright Line</label>
                <textarea id="sg_cms_copyright_line" class="form-control" name="sg_cms_copyright_line">{{ $cms->sg_cms_copyright_line }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <h3>Product Section</h3>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_product_header_text">Header Text</label>
                <textarea id="sg_cms_product_header_text" class="form-control" name="sg_cms_product_header_text">{{ $cms->sg_cms_product_header_text }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_product_section_image">Product Section Image</label>
                <input type="file" onchange="validateImageSize(this);" id="sg_cms_product_section_image"
                    accept="image/png, image/jpeg" class="form-control" name="sg_cms_product_section_image">
            </div>
            @if ($cms->sg_cms_product_section_image)
                <div class="backendimage">
                    <img src="{{ asset('images/popupimage/' . $cms->sg_cms_product_section_image) }}">
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <h3>Block Section</h3>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_block_title">Block Title</label>
                <input type="text" id="sg_cms_block_title" class="form-control" name="sg_cms_block_title"
                    value="{{ $cms->sg_cms_block_title }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_block_content">Block Content</label>
                <textarea id="sg_cms_block_content" class="form-control" name="sg_cms_block_content">{{ $cms->sg_cms_block_content }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_cms_block_link">Block Link</label>
                <input type="text" id="sg_cms_block_link" class="form-control" name="sg_cms_block_link"
                    value="{{ $cms->sg_cms_block_link }}">
            </div>
        </div>
        <div class="col-md-12 mb-5">
            <div class="form-group">
                <label for="sg_cms_block_image">Block Image</label>
                <input type="file" onchange="validateImageSize(this);" id="sg_cms_block_image"
                    accept="image/png, image/jpeg" class="form-control" name="sg_cms_block_image">
            </div>

            @if ($cms->sg_cms_block_image)
                <div class="backendimage">
                    <img src="{{ asset('images/blockimage/' . $cms->sg_cms_block_image) }}">
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/cms/cmsdetails') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
