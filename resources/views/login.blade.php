 {{-- @include('initialheader') --}}
 @include('frontwebsite.frontheader')
 <main class="login-form">
     <div class="cotainer">
         <div class="row justify-content-center">
             <div class="col-md-4">
                 <div class="card">
                     <h3 class="card-header">Login</h3>
                     <div class="card-body">
                         <form action="{{ route('login.post') }}" method="POST">
                             @csrf
                             <div class="form-group">
                                 <label for="email_address">E-Mail Address</label>
                                 <input type="text" id="email_address" class="form-control" name="email" required
                                     autofocus>
                                 @if ($errors->has('email'))
                                     <span class="text-danger">{{ $errors->first('email') }}</span>
                                 @endif
                             </div>

                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" id="password" class="form-control" name="password" required>
                                 @if ($errors->has('password'))
                                     <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif

                                 @if (Route::has('password.request'))
                                     <div class="form-group mb-4">
                                         <a href="{{ route('password.request') }}"
                                             class="small text-dark   text-underline--dashed  border-primary">
                                             {{ __('Forgot Your Password?') }}</a>
                                     </div>
                                 @endif
                             </div>
                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary">
                                     Login
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
