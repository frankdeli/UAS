@extends('layout/main')

@section('content')
<div class="main_content">
    <div class="title_content">
        <h2>{{ __('localization.login.login') }}</h2>
    </div>

    <div class="form_signup">
        <form action="{{ route('sign_in', app()->getLocale()) }}" method="POST">
            @csrf
            <div class="signup">
                <div class="left_sign">
                    <div class="form-group row">
                        <label for="Email" class="col-4 col-form-label la">{{ __('localization.login.email') }}</label> 
                        <div class="col-8">
                          <input id="Email" name="email" type="email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Password" class="col-4 col-form-label la">{{ __('localization.login.password') }}</label> 
                        <div class="col-8">
                          <input id="Password" name="password" type="password" class="form-control">
                        </div>
                    </div> 
                </div>
            </div>

            <div class="button_submit1">
                <div class="form-group row">
                    <div class="offset-4 col-8">
                      <button name="submit" type="submit" class="btn btn-primary sbmit_btn">{{ __('localization.login.submit') }}</button>
                      <p><a href="{{ route('signup', app()->getLocale()) }}">{{ __('localization.login.signup') }}</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>    
</div>
@endsection