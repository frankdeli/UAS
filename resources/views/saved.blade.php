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
    <div class="main2">
        <p>{{ __('localization.pop-mess.saved') }}</p>
        <a href="{{ route('home', app()->getLocale()) }}">{{ __('localization.pop-mess.click_home') }}</a>
    </div>
@endsection