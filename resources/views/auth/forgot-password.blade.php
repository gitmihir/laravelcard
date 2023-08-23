@include('frontwebsite.frontheader')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h5 class="card-header">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </h5>
                    <div class="card-body">
                        <div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="block">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="form-control emailcheckfr" type="email"
                                        name="email" :value="old('email')" required autofocus />
                                </div>
                                <p class="error-block"></p>
                                <div class="flex items-center justify-end mt-4">
                                    <input type="hidden" class="ajaxurlforforgotpassword"
                                        value="{{ url('/forgotpasswordfr') }}">
                                    <button class="btn btn-primary disableclass"
                                        type="submit">{{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

@include('frontwebsite.frontfooter')
