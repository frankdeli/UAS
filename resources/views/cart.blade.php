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

<div class="table">
    <table class="table_cart">
        <tr>
            <th>{{ __('localization.cart.title') }}</th>
        </tr>
        @if (sizeof($find) != 0)
            @foreach ($find as $f)
                <tr>
                    <td>{{ $f->ebook->title }}</td>
                    <form action="{{ route('delete', ['id'=>$f->id, 'locale'=>app()->getLocale()]) }}" method="POST">
                        @csrf
                        <td><button type="submit" class="btn btn-link">{{ __('localization.cart.delete') }}</button></td>
                    </form>
                </tr>
            @endforeach
        @else
            <p style="text-align: center" class="empty">{{ __('localization.cart.empty') }}</p>
        @endif
        
    </table>
</div>

<div class="submit_cart">
    <form action="{{ route('co', app()->getLocale()) }}" method="POST">
        @csrf
        <button type="submit">{{ __('localization.cart.submit') }}</button>
    </form>
</div>
@endsection