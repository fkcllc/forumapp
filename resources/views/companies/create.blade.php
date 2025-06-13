@extends('layouts.app')

@section('content')
<div class="container">
    <h2>会社新規作成</h2>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cname" class="form-label">会社名</label>
            <input type="text" name="cname" id="cname" class="form-control" value="{{ old('cname') }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">住所</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">電話番号</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Webサイト</label>
            <input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
