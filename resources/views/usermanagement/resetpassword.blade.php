@include('layout.partials.head')
<form action="{{ url('update-password/' . $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>Reset Your Password</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="text" name="password" class="form-control firstpassword">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Re-Type Password</label>
                <input type="text" onkeyup="matchpassword(this);
                "
                    class="form-control secondpassword">
            </div>
        </div>
        <div class="col-md-12">
            <p class="successmsg">Password Matched!</p>
            <p class="failmsg">Password did not match!</p>
            <p>
                @if (Session::has('message'))
                    {{ Session::get('message') }}
                @endif
            </p>
        </div>
        <div class="col-md-12">
            <input type="submit" value="Update Password" class="btn btn-primary disablebtn">
            <a href="{{ url('/') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
