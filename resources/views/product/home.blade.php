@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10">
            <a class="text-secondary" href="/home">
                <h2 class=''>商品一覧</h2>
            </a>

            <!-- 
            <form action="{{url('/search')}}" method="GET">
                <div><input type="text" name="keyword" value="{{ $keyword ?? '' }}"></div>
                <div class="col-sm-auto">
                    <button type="submit" class="btn btn-primary ">検索</button>
                </div>
                <p><input type="submit" value="検索"></p>
                
                <div class="form-group row">
                    <label class="col-sm-2">商品カテゴリ</label>
                    <div class="col-sm-3">
                        <select name="categoryId" class="form-control" value="">
                            <option value="">未選択</option>

                            <option value="">
                            
                            </option>
                        </select>
                    </div>
                </div>
            </form> -->

            <!-- 検索バー -->
            <div class="row">
                <div class="col-sm">
                    <form method="GET" action="{{url('/search') }}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">商品名</label>
                            <!--入力-->
                            <div class="col-sm-5">
                                <input type="text" name="keyword" value="{{ $keyword ?? '' }}">
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary ">検索</button>
                            </div>
                        </div>
                        <!--プルダウンカテゴリ選択-->
                        <div class="form-group row">
                            <label class="col-sm-2">メーカー名</label>
                            <div class="col-sm-3">
                                <select name="company_name" class="form-control" value="{{ $company_name }}">
                                    <option value="">未選択</option>

                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-10 justify-content-center">
    <button class="btn btn-secondary mt-3 mb-3" type="button" onclick=" location.href='/product/create' ">新規商品登録</button>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>値段</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ asset('/storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->image }}" width="200" height="200"></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company->company_name }}</td>
            <td><button type="button" class="btn btn-primary" onclick=" location.href='/product/{{ $product->id }}' ">詳細</button></td>
            <form action="{{ route('delete', $product->id) }}" onsubmit="return checkDelete()">
                <td><button type="submit" class="btn btn-primary">削除</button></td>
            </form>
        </tr>
        @endforeach
    </table>
</div>
</div>
</div>

<script>
    function checkDelete() {
        if (window.confirm('削除してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
</div>