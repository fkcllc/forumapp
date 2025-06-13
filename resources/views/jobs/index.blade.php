
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center mb-3">
        <div class="col">
            <h2 class="mb-0">求人情報一覧</h2>
        </div>
        @auth
        <div class="col-auto text-end">
            <a href="{{ route('jobs.create') }}" class="btn btn-success">＋ 新規作成</a>
        </div>
        @endauth
    </div>
    <table class="table table-bordered">
        <thead class="text-center align-middle">
            <tr>
                <th>№</th>
                <th>職位</th>
                {{-- <th>会社ID</th> --}}
                {{-- <th>業種</th> --}}
                <th>住所</th>
                <th>雇用形態</th>
                {{-- <th>応募状態</th> --}}
                <th>期限日</th>
                <th>作成日</th>
                <th>操作</th> {{-- 追加 --}}
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $loop->iteration + ($jobs->currentPage() - 1) * $jobs->perPage() }}</td>
                <td><i class="bi bi-person-circle"></i>&nbsp;{{ $job->position }}</td>
                {{-- <td>{{ $job->company_id }}</td> --}}
                {{-- <td>{{ $job->category_id }}</td> --}}
                <td><i class="bi bi-geo-alt-fill"></i>&nbsp;{{ $job->address }}</td>

                <td>{{ $job->type }}</td>
                {{-- <td>{{ $job->status }}</td> --}}
                <td>{{ \Carbon\Carbon::parse($job->last_date)->format('Y/m/d') }}</td>
                <td>{{ $job->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">詳細</a>
                    @auth
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">更新</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
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
        全 {{ $jobs->total() }} 件中 {{ $jobs->firstItem() }} 件から {{ $jobs->lastItem() }} 件を表示
    </div>
    {{ $jobs->links('vendor.pagination.bootstrap-4') }}
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
