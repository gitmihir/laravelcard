@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Franchise Details
        </h3>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Franchise Name</th>
                <td>{{ $viewfranchiseindetail->sg_franchise_name }}</td>
            </tr>
            <tr>
                <th>Franchise Contact Number</th>
                <td>{{ $viewfranchiseindetail->sg_franchise_contact_number }}
                </td>
            </tr>
            <tr>
                <th>Franchise Email</th>
                <td>{{ $viewfranchiseindetail->sg_franchise_email }}</td>
            </tr>
            <tr>
                <th>Franchise Password</th>
                <td>{{ $viewfranchiseindetail->sg_franchise_password }}</td>
            </tr>
        </table>
        <a href="{{ url('/franchise/allfranchise') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
