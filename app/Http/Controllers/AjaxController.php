<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //
    public function getCompany() {
        $getCompanyName = Company::pluck('company_name', 'id');
        return $getCompanyName;
    }
    //----------------------------------------------------------------------

    //検索機能の非同期処理
    public function exeAjaxSearch(Request $request) {

        //queryビルダ
        $query = Product::query();

        $search_keyword = $request->input('keyword');
        $company_name = $request->input('company_name');
        
        //商品名で検索する処理
        
        $search = Product::with('Company')->where('product_name', 'LIKE', "%$search_keyword%")//商品名
                                            ->where('company_id', 'LIKE', "%$company_name%")//メーカー名
                                            ->get();

        //デバッグテキスト
        // error_log(var_export($search, true), 3, "./debug.txt");

        return response()->json($search);
    }
    //----------------------------------------------------------------------

    //削除機能
    public function deleteProduct($id) {
        try {
            $productModel = new Product;
            $productModel->deleteProduct($id);
        } catch (\Throwable $e) {
            abort(500);
        }
        exit();
    }
}