@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name . ' ' . __('You are logged in!') }}
                    <form id="profileForm"  action="{{ route('profile.index') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('profileForm').submit();">
                                全てプロファイルを見る
                            </a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
