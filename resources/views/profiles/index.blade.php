@php
    use App\Constants\UserType;

    $isAdmin = Auth::check() && Auth::user()->user_type === UserType::ADMIN;

@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center mb-3">
        <div class="col">
            <h2 class="mb-0">プロフィール一覧</h2>
        </div>
        <div class="col-auto text-end">
            @if ($isAdmin)
                <a href="{{ route('profiles.create') }}" class="btn btn-success">＋ 新規作成</a>
            @endif
        </div>

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
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ optional($user->profile)->bio }}</td>
                <td>
                    {{ optional($user->profile)->created_at ? \Carbon\Carbon::parse($user->profile->created_at)->format('Y/m/d H:i:s') : ' ' }}
                </td>
                <td>
                    <a href="{{ route('profiles.show', optional($user->profile)->id) }}" class="btn btn-info btn-sm">詳細</a>
                    @auth
                    <a href="{{ route('profiles.edit', optional($user->profile)->id) }}" class="btn btn-warning btn-sm">編集</a>
                        @if ($isAdmin)
                            <form action="{{ route('profiles.destroy', optional($user->profile)->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        @endif
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (Auth::user() && Auth::user()->user_type === UserType::ADMIN)
    <div>
        全 {{ $users->total() }} 件中 {{ $users->firstItem() }} 件から {{ $users->lastItem() }} 件を表示
    </div>
    {{ $users->links('vendor.pagination.bootstrap-4') }}
    @endif

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
