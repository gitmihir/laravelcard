@include('layout.partials.head')
@php
    $viewleads = App\Models\Lead::orderBy('id', 'asc')->get();
@endphp
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Leads</h3>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewleads as $leaddata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $leaddata->sg_lead_name }}</td>
                        <td>
                            @php
                                $createDate = new DateTime($leaddata->created_at);
                                $strip = $createDate->format('d-m-Y');
                            @endphp
                            {{ $strip }}</td>
                        <td>{{ $leaddata->sg_lead_contact_number }}</td>
                        <td>{{ $leaddata->sg_lead_email_address }}</td>
                        <td>
                            <button type="button" delete-url-id='{{ url('delete-lead/' . $leaddata->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal" data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.partials.footer')
