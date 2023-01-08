@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Client Details
        </h3>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Name</th>
                <td>{{ $viewclientindetail->sg_client_name }}</td>
            </tr>
            <tr>
                <th>Logo</th>
                <td><img src="{{ asset('images/clientimages/' . $viewclientindetail->sg_client_logo) }}">
                </td>
            </tr>
        </table>
        <a href="{{ url('/clients/allclients') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
