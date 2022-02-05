<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProductRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AjaxController extends Controller
{
    // //検索機能の非同期処理
    // public function exeAjaxSearch($search_keyword)
    // {
    //     //入力される値nameの定義

    //     $keyword = Product::where('product_name', 'LIKE', "%$search_keyword%")->get(); //商品名
    //     // $company_name = $request->input('company_name'); //メーカー名

    //     return response()->json($keyword);

    //     // $product_name = Product::where('product_name', 'LIKE', "%{$keyword}%");
    // }

    //-----------------------------------------------------------------------

    //検索機能の非同期処理
    public function exeAjaxSearch(Request $request)
    {
        $companies = Company::all();

        //入力される値nameの定義
        $keyword = $request->input('keyword'); //商品名
        $company_name = $request->input('company_name'); //メーカー名

        //queryビルダ
        $query = Product::query();

        //キーワード検索機能
        if (!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        //プルダウン検索機能
        if (isset($company_name)) {
            $query->where('company_id', $company_name);
        }

        $products = $query->get();

        return response()->json([
            'product_name' => $keyword,
            'company_name' => $company_name,
        ]);
    }
}
