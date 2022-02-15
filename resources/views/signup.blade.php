@extends('layout/main')

@section('content')
    <div class="main_content">
        <div class="title_content">
            <h2>{{ __('localization.signup.signup') }}</h2>
        </div>

        <div class="form_signup">
            <form action="{{ route('sign_up', app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="signup">
                    <div class="left_sign">
                        <div class="form-group row">
                            <label for="First" class="col-4 col-form-label la">{{ __('localization.signup.first_name') }}</label> 
                            <div class="col-8">
                              <input id="First" name="first" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Last" class="col-4 col-form-label la">{{ __('localization.signup.last_name') }}</label> 
                            <div class="col-8">
                              <input id="Last" name="last" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-4 la">{{ __('localization.signup.gender') }}</label> 
                            <div class="col-8 gen">
                              @foreach ($gender as $g)
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input name="gender" id="Gender0" type="radio" class="custom-control-input" value="{{ $g->id }}"> 
                                  <label for="Gender0" class="custom-control-label">{{ $g->gender_desc }}</label>
                                </div>
                              @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password" class="col-4 col-form-label la">{{ __('localization.signup.password') }}</label> 
                            <div class="col-8">
                              <input id="Password" name="password" type="password" class="form-control">
                            </div>
                        </div> 
                    </div>

                    <div class="right_sign">
                        <div class="form-group row">
                            <label for="Middle" class="col-4 col-form-label la">{{ __('localization.signup.middle_name') }}</label> 
                            <div class="col-8">
                              <input id="Middle" name="middle" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Email" class="col-4 col-form-label la">{{ __('localization.signup.email_address') }}</label> 
                            <div class="col-8">
                              <input id="Email" name="email" type="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Role" class="col-4 col-form-label la">{{ __('localization.signup.role') }}</label> 
                            <div class="col-8">
                              <select id="Role" name="role" class="custom-select">
                                @foreach ($role as $r)
                                  <option value="{{ $r->id }}">{{ $r->role_desc }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Image" class="col-4 col-form-label la">{{ __('localization.signup.display_picture') }}</label> 
                            <div class="col-8">
                              <input id="Image" name="image" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button_submit">
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="submit" type="submit" class="btn btn-primary sbmit_btn">{{ __('localization.signup.submit') }}</button>
                          <p><a href="{{ route('signin', app()->getLocale()) }}">{{ __('localization.signup.login') }}</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>    
    </div>
@endsection