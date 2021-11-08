@extends('layouts.master_auth')

@section('content')
<div class="container">
    @if (session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
    @endif
    <div>
        <h3>ログインユーザー情報</h3>
        <ul>
            <li>ユーザー名：{{ Auth::user()->user_name}}</li>
            <li>メールアドレス：{{ Auth::user()->email}}</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>ブログ記事一覧</h2>
            <table class="table table-striped">
                <tr>
                    <th>記事番号</th>
                    <th>日付</th>
                    <th>タイトル</th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2020/06/30</td>
                    <td>テスト</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection