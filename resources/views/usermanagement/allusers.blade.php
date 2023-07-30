@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>All Users</h3>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example3" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewusers as $userdata)
                    <tr>
                        <td>{{ $userdata->id }}</td>
                        <td>{{ $userdata->name }}</td>
                        <td>{{ $userdata->email }}</td>
                        <td>
                            @if ($userdata->user_role === 'super_admin')
                                {{ 'Admin' }}
                            @elseif($userdata->user_role === 'normaluser')
                                {{ 'User' }}
                            @elseif($userdata->user_role === 'franchiseuser')
                                {{ 'Franchise User' }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('edit-user/' . $userdata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-user/' . $userdata->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal"
                                data-target="#modaldelete">
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
