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

<div class="update">
    <div class="title-up">
        <h3>{{ $acc->first_name }} {{ $acc->middle_name }} {{ $acc->last_name }}</h3>
    </div>

    <div class="main-update">
        <form action="{{ route('update_role', ['id'=>$acc->id, 'locale'=>app()->getLocale()]) }}" method="POST">
            @csrf
            <div class="form-group row updt">
                <label for="Role" class="col-4 col-form-label la">{{ __('localization.update_role.role') }}</label> 
                <div class="col-8">
                  <select id="Role" name="role" class="custom-select">
                    @foreach ($role as $r)
                        <option value="{{ $r->id }}">{{ $r->role_desc }}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="form-group row updt">
                <div class="offset-4 col-8">
                  <button name="submit" type="submit" class="btn btn-primary sbmit_btn">{{ __('localization.update_role.save') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection