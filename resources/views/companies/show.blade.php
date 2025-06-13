@extends('layouts.app')

@section('content')
<div class="container">
    <h2>会社詳細</h2>
    <table class="table table-bordered">
        <tr>
            <th>会社名</th>
            <td>{{ $company->cname }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $company->address }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $company->phone }}</td>
        </tr>
        <tr>
            <th>Webサイト</th>
            <td>{{ $company->website }}</td>
        </tr>
        <tr>
            <th>作成日</th>
            <td>{{ \Carbon\Carbon::parse($company->created_at)->format('Y/m/d H:i:s') }}</td>
        </tr>
    </table>
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    @auth
    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">編集</a>
    @endauth
</div>
@endsection
