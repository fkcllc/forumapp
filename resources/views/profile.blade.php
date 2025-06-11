@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">全てのプロファイル</div>
                @foreach ($all_users as $all_user)
                    <div class="user-info">
                        <h5>{{ $all_user->name }}</h5>
                        <p>Email: {{ $all_user->email }}</p>
                        <p>Address:
                            @if ($all_user->profile && $all_user->profile['address'])
                                {{ $all_user->profile['address'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
