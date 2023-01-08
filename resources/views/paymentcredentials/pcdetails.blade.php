@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Patment Credentails
        </h3>
    </div>
    <div class="col-md-8">
        @foreach ($viewpc as $pcdata)
            <table class="table">
                <tr>
                    <th>Public Key</th>
                    <td>{{ $pcdata->sg_pc_public_key }}</td>
                </tr>
                <tr>
                    <th>Secret Key</th>
                    <td>{{ $pcdata->sg_pc_secret_key }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @php
                            if ($pcdata->sg_pc_status == '0') {
                                echo 'On';
                            } elseif ($pcdata->sg_pc_status == '1') {
                                echo 'Off';
                            }
                        @endphp
                    </td>
                </tr>
            </table>
            <a href="{{ url('edit-pc/' . $pcdata->id) }}" class="btn btn-primary btn-sm">Update Credentials</a>
        @endforeach
    </div>
</div>
@include('layout.partials.footer')
