@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center mb-3">
        <div class="col">
            <h2 class="mb-0">プロフィール一覧</h2>
        </div>
        @auth
        <div class="col-auto text-end">
            <a href="{{ route('profiles.create') }}" class="btn btn-success">＋ 新規作成</a>
        </div>
        @endauth
    </div>
    <table class="table table-bordered">
        <thead class="bg-primary text-white text-center align-middle">
            <tr>
                <th>№</th>
                <th>名前</th>
                <th>メール</th>
                <th>自己紹介</th>
                <th>作成日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{ $loop->iteration + ($profiles->currentPage() - 1) * $profiles->perPage() }}</td>
                <td>{{ $profile->name }}</td>
                <td>{{ $profile->email }}</td>
                <td>{{ $profile->bio }}</td>
                <td>{{ \Carbon\Carbon::parse($profile->created_at)->format('Y/m/d H:i:s') }}</td>
                <td>
                    <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info btn-sm">詳細</a>
                    @auth
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">編集</a>
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        全 {{ $profiles->total() }} 件中 {{ $profiles->firstItem() }} 件から {{ $profiles->lastItem() }} 件を表示
    </div>
    {{ $profiles->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@push('styles')
<style>
.table th {
    color: #ffffff;
    background-color: #1877f2;
}
</style>
@endpush
