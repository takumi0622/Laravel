@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10">
            <a class="text-secondary" href="/home">
                <h2 class=''>商品一覧</h2>
            </a>

            <!-- 検索フォーム -->
            <div class="row search-wrapper">
                <!-- 検索バー -->
                <div class="col-sm">
                    <form id="js-form" method="GET" action="{{url('/exeAjax') }}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">商品名</label>
                            <!--入力-->
                            <div class="col-sm-5">
                                <input type="text" name="keyword" value="{{ $keyword ?? '' }}" id="search_keyword">
                            </div>
                            <!-- 検索ボタン -->
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-primary " id="search_button">検索</button>
                            </div>
                        </div>
                        
                        <!--プルダウンカテゴリ選択-->
                        <div class="form-group row">
                            <label class="col-sm-2">メーカー名</label>
                            <div class="col-sm-3">
                                <select id="company_name" name="company_name" class="form-control" value="">
                                    <option value="">未選択</option>

                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <!-- 価格検索機能 -->
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="col-md-10 justify-content-center">

    <!-- 商品登録画面へ遷移するボタン -->
    <button class="btn btn-secondary mt-3 mb-3" type="button" onclick=" location.href='/product/create' ">新規商品登録</button>

    <!-- 商品一覧テーブル -->
    <table class="table table-striped append " id="product_table">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>商品画像</th>
                <th>@sortablelink('product_name', '商品名')</th>
                <th>@sortablelink('price', '価格')</th>
                <th>@sortablelink('stock', '在庫数')</th>
                <th>メーカー名</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class='product_table'>
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset('/storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->image }}" width="200" height="200"></td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company->company_name }}</td>
                <td><button type="button" class="btn btn-primary" onclick=" location.href='/product/{{ $product->id }}' ">詳細</button></td>
                <form method="delete" action="{{ route('delete', $product->id) }}">
                    @csrf
                    <td><button type="button" class="btn btn-danger deleteProductButton">削除</button></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table id="append"></table>
</div>
</div>
</div>
@endsection
</div>