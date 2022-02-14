<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //検索機能の非同期処理
    public function exeAjaxSearch($search_keyword) {

        $companies = Company::all();
        $products = Product::all();
        
        //入力される値nameの定義
        $keyword = Product::with('Company')->where('product_name', 'LIKE', "%$search_keyword%")->get();

        // // $keyword = Product::where('product_name', 'LIKE', "%$search_keyword%")->get(); //商品名
        // // $company_name = $request->input('company_name'); //メーカー名

        return response()->json($keyword);

        // $product_name = Product::where('product_name', 'LIKE', "%{$keyword}%");
    }
}
