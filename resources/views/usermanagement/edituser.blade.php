@include('layout.partials.head')
<form action="{{ url('update-user/' . $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Update User</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Change Password</label>
                <p>If you do not wish to change the password leave it empty.</p>
                <input type="text" name="password" class="form-control" id="password">
            </div>
        </div>
        <div class="col-md-12">
            <input type="submit" value="Update" class="btn btn-primary">
            <a href="{{ url('/usermanagement/allusers') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
