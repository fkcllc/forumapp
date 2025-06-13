@extends('layouts.app')

@section('content')
<div class="container">
    <h2>プロフィール詳細</h2>
    <table class="table table-bordered">
        <tr>
            <th>名前</th>
            <td>{{ $profile->name }}</td>
        </tr>
        <tr>
            <th>メール</th>
            <td>{{ $profile->email }}</td>
        </tr>
        <tr>
            <th>自己紹介</th>
            <td>{{ $profile->bio }}</td>
        </tr>
        <tr>
            <th>作成日</th>
            <td>{{ \Carbon\Carbon::parse($profile->created_at)->format('Y/m/d H:i:s') }}</td>
        </tr>
    </table>
    <a href="{{ route('profiles.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    @auth
    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning">編集</a>
    @endauth
</div>
@endsection
