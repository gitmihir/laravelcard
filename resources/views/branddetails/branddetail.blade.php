@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Brand Details
        </h3>
    </div>
    <div class="col-md-8">
        @foreach ($viewbrand as $branddata)
            <table class="table">
                <tr>
                    <th>Logo</th>
                    <td>
                        <div class="brandlogoimages">
                            <img src="{{ asset('images/brandimages/' . $branddata->sg_brand_logo) }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Favicon</th>
                    <td>
                        <div class="brandlogoimages">
                            <img src="{{ asset('images/brandimages/' . $branddata->sg_favicon_icon) }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Tagline</th>
                    <td>{{ $branddata->sg_brand_tagline }}</td>
                </tr>
                <tr>
                    <th>Business Name</th>
                    <td>{{ $branddata->sg_brand_business_name }}</td>
                </tr>
                <tr>
                    <th>Business Logo</th>
                    <td>
                        <div class="brandlogoimages">
                            <img src="{{ asset('images/brandimages/' . $branddata->sg_brand_business_logo) }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Business Address</th>
                    <td>{{ $branddata->sg_brand_business_address }}</td>
                </tr>
                <tr>
                    <th>Business Email</th>
                    <td>{{ $branddata->sg_brand_business_email }}</td>
                </tr>
                <tr>
                    <th>Business Phone</th>
                    <td>{{ $branddata->sg_brand_busienss_phone }}</td>
                </tr>
                <tr>
                    <th>Business GSTIN</th>
                    <td>{{ $branddata->sg_gstin }}</td>
                </tr>
                {{-- <tr>
                    <th>GTS %</th>
                    <td>{{ $branddata->sg_gstin_tax }}</td>
                </tr> --}}
                <tr>
                    <th>Business T&C line</th>
                    <td>{{ $branddata->sg_brand_tandc_line }}</td>
                </tr>
                <tr>
                    <th>Upload Limit</th>
                    <td>{{ $branddata->sg_brand_upload_limit }}</td>
                </tr>
            </table>
            <a href="{{ url('edit-brand/' . $branddata->id) }}" class="btn btn-primary btn-sm">Update Brand Details</a>
        @endforeach
    </div>
</div>
@include('layout.partials.footer')
