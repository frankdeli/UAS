@extends('layout/main')

@section('side')
    <ul class="bar">
        <li><a href="{{ route('signup', app()->getLocale()) }}">{{ __('localization.layout.signup') }}</a></li>
        <li><a href="{{ route('signin', app()->getLocale()) }}">{{ __('localization.layout.signin') }}</a></li>
    </ul>
@endsection

@section('content')
    <div class="main1">
        <p>{{ __('localization.pop-mess.logout_success') }}</p>
    </div>
@endsection