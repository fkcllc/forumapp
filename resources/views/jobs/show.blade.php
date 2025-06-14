@extends('layouts.app')

@section('content')
<div class="container">
    <h2>求人情報詳細</h2>
    <table class="table table-bordered">
        <tr>
            <th>タイトル</th>
            <td>{{ $job->title }}</td>
        </tr>
        <tr>
            <th>業種</th>
            <td>{{ $job->category_id }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $job->address }}</td>
        </tr>
        <tr>
            <th>タイプ</th>
            <td>{{ $job->type }}</td>
        </tr>
        <tr>
            <th>応募状態</th>
            <td>{{ $job->status }}</td>
        </tr>
        <tr>
            <th>期限日</th>
            <td>{{ \Carbon\Carbon::parse($job->last_date)->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>作成日</th>
            <td>{{ \Carbon\Carbon::parse($job->created_at)->format('Y/m/d H:i:s') }}</td>
        </tr>
    </table>
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    @auth
    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning">編集</a>
    @endauth
</div>
@endsection
