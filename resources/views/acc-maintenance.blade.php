@extends('layout/main')

@section('side')
    @if (Auth::check())
        <form action="{{ route('logout', app()->getLocale()) }}"" method="POST">
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

<div class="main-table">
    <table class="acc">
        <tr>
            <th>{{ __('localization.account.account') }}</th>
            <th>{{ __('localization.account.action') }}</th>
        </tr>

        <tr>
            @foreach ($acc as $a)
                <div class="role">
                    @if ($a->role_id == 1)
                        {{ $role = 'Admin' }}
                    @else
                        {{ $role = 'User' }}
                    @endif
                </div>
                <td>{{ $a->first_name }} {{ $a->middle_name }} {{ $a->last_name }} - {{ $role}}</td>
                <td>
                    <div class="action">
                        <form action="{{ route('update_role', ['id'=>$a->id, 'locale'=>app()->getLocale()]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-link">{{ __('localization.account.update_role') }}</button>
                        </form>

                        <form action="{{ route('delete_acc', ['id'=>$a->id, 'locale'=>app()->getLocale()]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">{{ __('localization.account.delete') }}</button>
                        </form>
                    </div>
                </td>
            @endforeach
        </tr>
    </table>
</div>
@endsection