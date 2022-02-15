@extends('layout/main')

@section('side')
    @if (Auth::check())
        <form action="{{ route('logout', app()->getLocale()) }}" method="POST">
            @csrf
            <button class="logout btn-link" id="style" style="font-weight: bold">{{ __('localization.layout.logout') }}</button>
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

    <div class="table">
        <table class="table_home">
            <tr>
                <th>{{ __('localization.home.author') }}</th>
                <th>{{ __('localization.home.title') }}</th>
            </tr>
            
            @foreach ($ebook as $e)
            <tr>
                <td>{{ $e->author }}</td>
                <td><a href="{{ route('detail', ['id'=>$e->id, 'locale'=>app()->getLocale()]) }}">{{ $e->title }}</a></td>
            </tr>  
            @endforeach
        </table>
    </div>
@endsection