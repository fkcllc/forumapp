@extends('layouts.app')

@section('content')
<div class="container">
    <h2>求人新規作成</h2>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="position" class="form-label">職位</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">業種</label>
            <input type="text" name="category_id" id="category_id" class="form-control" value="{{ old('category_id') }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">住所</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">雇用形態</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">選択してください</option>
                @foreach($types as $type)
                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">応募状態</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}">
        </div>

        <div class="mb-3">
            <label for="last_date" class="form-label">期限日</label>
            <input type="date" name="last_date" id="last_date" class="form-control" value="{{ old('last_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
