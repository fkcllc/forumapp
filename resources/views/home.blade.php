@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <div class="card-header">ダッシュボード</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ Auth::user()->name . ' ' . __('You are logged in!') }} --}}
                    {{ 'ようこそ' . Auth::user()->name . '様'}}

                    <br><br>

                    {{-- 企業様 --}}
                    <form id="companyForm"  action="{{ route('companies.index') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('companyForm').submit();">
                                企業様向け
                            </a>
                        </div>
                    </form>

                    <br>

                    {{-- 求職者様向け --}}
                    <form id="profileForm"  action="{{ route('profiles.index') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('profileForm').submit();">
                                求職者様向け
                            </a>
                         </div>
                    </form>

                    <br>

                    {{-- 求人 --}}
                    <form id="jobForm"  action="{{ route('jobs.index') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('jobForm').submit();">
                                求人情報
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
