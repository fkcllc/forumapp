@extends('layouts.app')

@section('content')
<div class="container">
    <h2>求人情報編集</h2>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $job->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">業種</label>
            <input type="text" name="category_id" id="category_id" class="form-control" value="{{ old('category_id', $job->category_id) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">住所</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $job->address) }}">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">タイプ</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $job->type) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">応募状態</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $job->status) }}">
        </div>

        <div class="mb-3">
            <label for="last_date" class="form-label">最終日</label>
            <input type="date" name="last_date" id="last_date" class="form-control" value="{{ old('last_date', $job->last_date) }}">
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
