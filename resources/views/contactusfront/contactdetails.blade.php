@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Contact Details
        </h3>
    </div>
    <div class="col-md-8">

        <table class="table">
            <tr>
                <th>Title</th>
                <td>{{ $viewcontactindfr->sg_contact_title }}</td>
            </tr>
            <tr>
                <th>Detail</th>
                <td>{{ $viewcontactindfr->sg_contact_detail }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $viewcontactindfr->sg_contact_email }}</td>
            </tr>
            <tr>
                <th>Number</th>
                <td>{{ $viewcontactindfr->sg_contact_number }}</td>
            </tr>
        </table>

        <a href="{{ url('/contactusfront/allcontacts') }}" type="button" class="btn btn-info">Back</a>

    </div>
</div>
@include('layout.partials.footer')
