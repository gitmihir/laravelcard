@include('layout.partials.head')
@if (Auth::user()->user_role === 'super_admin')
    @php
        $viewcard = App\Models\Card::orderBy('id', 'desc')->get();
    @endphp
@elseif(Auth::user()->user_role === 'normaluser')
    @php
        $viewcard = App\Models\Card::where('sg_user_order_email', '=', Auth::user()->email)
            ->orderBy('id', 'DESC')
            ->get();
    @endphp
@endif
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>All Cards</h3>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example0" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Card No.</th>
                    <th>Order Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewcard as $carddata)
                    <tr>
                        <td>{{ $carddata->id }}</td>
                        <td>{{ $carddata->sg_order_id }}</td>
                        <td>
                            @php
                                $cardurl = explode('/', $carddata->sg_cd_QR_Link);
                            @endphp
                            <a target="_blank" href="{{ url('view-card-details/' . $cardurl[2] . '/' . $cardurl[3]) }}"
                                class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-card/' . $carddata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <a href="{{ url('edit-card/' . $carddata->id) }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-download"></i></a>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.partials.footer')
