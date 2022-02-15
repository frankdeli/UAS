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

    <div class="detail">
        <div class="content_detail">
            <h3>{{ __('localization.detail.e-book_detail') }}</h3>
            <p>{{ __('localization.detail.title') }} :       {{ $ebook->title }}</p>
            <p>{{ __('localization.detail.author') }} :      {{ $ebook->author }}</p>
            <p>{{ __('localization.detail.description') }} : {{ $ebook->description }}</p>

            <div class="rent">
                <form action="{{ route('rent', ['id'=>$ebook->id, 'locale'=>app()->getLocale()]) }}" method="POST">
                    @csrf
                    <button  type="submit" class="btn btn-link">{{ __('localization.detail.rent') }}</button>
                </form>
            </div>
        </div>

    </div>
@endsection