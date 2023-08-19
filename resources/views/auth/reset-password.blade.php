@include('frontwebsite.frontheader')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="block">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email', $request->email)" required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="form-control firstpassword" type="password"
                                    name="password" required autocomplete="new-password" />
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" onkeyup="matchpassword(this);"
                                    class="form-control secondpassword" type="password" name="password_confirmation"
                                    required autocomplete="new-password" />
                            </div>
                            <p class="successmsg">Password Matched!</p>
                            <p class="failmsg">Password did not match!</p>
                            <p>
                                @if (Session::has('status'))
                                    {{ Session::get('status') }}
                                @endif
                            </p>
                            <div class="flex items-center justify-end mt-4">
                                <button class="btn btn-primary disablebtn" type="submit"> {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('frontwebsite.frontfooter')
