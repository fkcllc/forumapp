@extends('layouts.app')

@section('content')
<div class="container">
    <h2>プロフィール新規作成</h2>
    <form action="{{ route('profiles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">メール</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">自己紹介</label>
            <textarea name="bio" id="bio" class="form-control">{{ old('bio') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ route('profiles.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
