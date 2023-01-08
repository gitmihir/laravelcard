@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            SMTP Details
        </h3>
    </div>
    <div class="col-md-8">
        @foreach ($viewsmtp as $smtpdata)
            <table class="table">
                <tr>
                    <th>Driver</th>
                    <td>{{ $smtpdata->sg_smtp_driver }}</td>
                </tr>
                <tr>
                    <th>Host</th>
                    <td>{{ $smtpdata->sg_smtp_host }}</td>
                </tr>
                <tr>
                    <th>Port</th>
                    <td>{{ $smtpdata->sg_smtp_port }}</td>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td>{{ $smtpdata->sg_smtp_username }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>{{ $smtpdata->sg_smtp_password }}</td>
                </tr>
                <tr>
                    <th>Encryption</th>
                    <td>{{ $smtpdata->sg_smtp_encryption }}</td>
                </tr>
                <tr>
                    <th>From Address</th>
                    <td>{{ $smtpdata->sg_smtp_from_address }}</td>
                </tr>
                <tr>
                    <th>From Name</th>
                    <td>{{ $smtpdata->sg_smtp_from_name }}</td>
                </tr>
            </table>
            <a href="{{ url('edit-smtp/' . $smtpdata->id) }}" class="btn btn-primary btn-sm">Update Settings</a>
        @endforeach
    </div>
</div>
@include('layout.partials.footer')
