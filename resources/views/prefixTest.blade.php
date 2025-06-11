@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Prefix 1</div>
            <div class="card-body">
                {{-- Use Unnamed route S--}}
                {{-- <form method="POST" action="/prefixes/test">
                    @csrf --}}
                {{-- Use Unnamed route E--}}

                {{-- Use Named route S--}}
                <form action="{{ route('pref3named') }}"  method="POST" >
                    @csrf
                    @method('PUT')
                {{-- Use Named route E--}}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="title" required value="za">
                        <button type="submit" class="btn btn-primary mt-3">送信</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection

