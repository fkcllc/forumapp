
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>求人情報一覧</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>タイトル</th>
                {{-- <th>会社ID</th> --}}
                <th>業種</th>
                <th>住所</th>
                <th>タイプ</th>
                <th>応募状態</th>
                <th>最終日</th>
                <th>作成日</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                {{-- <td>{{ $job->company_id }}</td> --}}
                <td>{{ $job->category_id }}</td>
                <td><i class="bi bi-geo-alt-fill"></i>{{ $job->address }}</td>

                <td>{{ $job->type }}</td>
                <td>{{ $job->status }}</td>
                <td>{{ $job->last_date }}</td>
                <td>{{ $job->created_at->diffForHumans() }}</td>
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
