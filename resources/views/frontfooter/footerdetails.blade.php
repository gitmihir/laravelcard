@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Front Footer Details
        </h3>
    </div>
    <div class="col-md-8">
        @foreach ($viewfrontfooter as $fronfooterdata)
            <table class="table">
                <tr>
                    <th>Facebook</th>
                    <td>{{ $fronfooterdata->sg_footer_fb_link }}</td>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td>{{ $fronfooterdata->sg_footer_inst_link }}</td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td>{{ $fronfooterdata->sg_footer_tw_link }}</td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td>{{ $fronfooterdata->sg_footer_lk_link }}</td>
                </tr>
                <tr>
                    <th>Pinterest</th>
                    <td>{{ $fronfooterdata->sg_footer_pt_link }}</td>
                </tr>
                <tr>
                    <th>Call</th>
                    <td>{{ $fronfooterdata->sg_footer_call_link }}</td>
                </tr>
                <tr>
                    <th>WhatsApp</th>
                    <td>{{ $fronfooterdata->sg_footer_whatsapp_link }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $fronfooterdata->sg_footer_email }}</td>
                </tr>
                <tr>
                    <th>Footer Text</th>
                    <td>{{ $fronfooterdata->sg_footer_text }}</td>
                </tr>
                <tr>
                    <th>Footer Address</th>
                    <td>{{ $fronfooterdata->sg_footer_address }}</td>
                </tr>
            </table>
            <a href="{{ url('edit-frontfooter/' . $fronfooterdata->id) }}" class="btn btn-primary btn-sm">Update
                Footer Details</a>
        @endforeach
    </div>
</div>
@include('layout.partials.footer')
