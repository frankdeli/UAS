@extends('layout/main')

@section('side')
    @if (Auth::check())
        <form action="{{ route('logout', app()->getLocale()) }}" method="POST">
            @csrf
            <button class="logout btn-link" id="style" style="font-weight: bold" >{{ __('localization.layout.logout') }}</button>
        </form>
    @endif
@endsection

@section('content')
<div class="topbar">
    <div class="topbar_container">
        <ul>
          <li><a href="{{ route('home', app()->getLocale()) }}">{{ __('localization.topbar.home') }}</a></li>
          <li><a href="{{ route('cart', app()->getLocale()) }}">{{ __('localization.topbar.cart') }}</a></li>
          <li><a href="{{ route('profile', app()->getLocale()) }}">{{ __('localization.topbar.profile') }}</a></li>
          @if (Auth::user()->role_id == 1)
              <li><a href="{{ route('acc_main', app()->getLocale()) }}">{{ __('localization.topbar.acc_main') }}</a></li>
          @endif
        </ul>
    </div>
</div>

<div class="profile">
    <div class="pic">
        <img src="{{ Storage::url($acc->display_picture_link) }}" alt="">
    </div>

    <div class="form-profile">
        <form action="{{ route('update.profile', ['id'=>$acc->id, 'locale'=>app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
            <div class="profile-content">
                    <div class="left-profile">
                        <div class="form-group row mt">
                            <label for="First" class="col-4 col-form-label la">{{ __('localization.signup.first_name') }}</label> 
                            <div class="col-8">
                              <input id="First" name="first" type="text" class="form-control" value="{{ $acc->first_name }}">
                            </div>
                        </div>
    
                        <div class="form-group row mt">
                            <label for="Last" class="col-4 col-form-label la">{{ __('localization.signup.last_name') }}</label> 
                            <div class="col-8">
                              <input id="Last" name="last" type="text" class="form-control" value="{{ $acc->middle_name }}">
                            </div>
                        </div>
    
                        <div class="form-group row mt">
                            <label class="col-4 la">{{ __('localization.signup.gender') }}</label> 
                            <div class="col-8 gen">
                              <div class="custom-control custom-radio custom-control-inline">
                                <input name="gender" id="Gender0" type="radio" class="custom-control-input" value="1" @if(strcmp($acc->gender->gender_desc, "Male") == 0) checked @endif> 
                                <label for="Gender0" class="custom-control-label">{{ __('localization.signup.male') }}</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input name="gender" id="Gender1" type="radio" class="custom-control-input" value="2" @if(strcmp($acc->gender->gender_desc, "Female") == 0) checked @endif> 
                                <label for="Gender1" class="custom-control-label">{{ __('localization.signup.female') }}</label>
                              </div>
                            </div>
                        </div>
    
                        <div class="form-group row mt">
                            <label for="Password" class="col-4 col-form-label la">{{ __('localization.signup.password') }}</label> 
                            <div class="col-8">
                              <input id="Password" name="password" type="password" class="form-control" placeholder="Contains Number">
                            </div>
                        </div> 
                    </div>
            
                    <div class="right-profile">
                        <div class="form-group row mt">
                            <label for="Middle" class="col-4 col-form-label la">{{ __('localization.signup.middle_name') }}</label> 
                            <div class="col-8">
                              <input id="Middle" name="middle" type="text" class="form-control" value="{{ $acc->last_name }}">
                            </div>
                        </div>
    
                        <div class="form-group row mt">
                            <label for="Email" class="col-4 col-form-label la">{{ __('localization.signup.email_address') }}</label> 
                            <div class="col-8">
                              <input id="Email" name="email" type="email" class="form-control" value="{{ $acc->email }}">
                            </div>
                        </div>
    
                        <div class="form-group row mt">
                            <label for="Role" class="col-4 col-form-label la">{{ __('localization.signup.role') }}</label> 
                            <div class="col-8">
                              <select id="Role" name="role" class="custom-select">
                                @foreach ($role as $r)
                                  <option value="{{ $r->id }}" @if($acc->role_id == $r->id) selected @endif>{{ $r->role_desc }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
    
                        <div class="form-group row mt">
                            <label for="Image" class="col-4 col-form-label la">{{ __('localization.signup.display_picture') }}</label> 
                            <div class="col-8">
                              <input id="Image" name="image" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>

            <div class="submit-profile">
                <div class="form-group row">
                    <div class="offset-4 col-8">
                      <button name="submit" type="submit" class="btn btn-primary sbmit_btn">{{ __('localization.profile.save') }}</button>
                    </div>
                </div>
            </div>
        </form>

        
    </div>
</div>
@endsection