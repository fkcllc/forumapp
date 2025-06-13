@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center mb-3">
        <div class="col">
            <h2 class="mb-0">会社一覧</h2>
        </div>
        @auth
        <div class="col-auto text-end">
            <a href="{{ route('companies.create') }}" class="btn btn-success">＋ 新規作成</a>
        </div>
        @endauth
    </div>
    <table class="table table-bordered">
        <thead class="bg-primary text-white text-center align-middle">
            <tr>
                <th>№</th>
                <th>会社名</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>Webサイト</th>
                <th>作成日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $loop->iteration + ($companies->currentPage() - 1) * $companies->perPage() }}</td>
                <td>{{ $company->cname }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ \Carbon\Carbon::parse($company->created_at)->format('Y/m/d H:i:s') }}</td>
                <td>
                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm">詳細</a>
                    @auth
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">編集</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
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
        全 {{ $companies->total() }} 件中 {{ $companies->firstItem() }} 件から {{ $companies->lastItem() }} 件を表示
    </div>
    {{ $companies->links('vendor.pagination.bootstrap-4') }}
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
