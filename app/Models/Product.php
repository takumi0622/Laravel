<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Kyslik\ColumnSortable\Sortable;



class Product extends Model
{
    use HasFactory;
    use Sortable; //ソート機能

    protected $table = 'products';

    //可変項目
    protected $fillable = [
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'image',
    ];

    //ソート機能(ソートに使うカラムを指定)
    public $sortable = [
        'id',
        'product_name',
        'company_id',
        'price',
        'stock',
    ];

    // Companiesテーブルと関連付ける
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    //キーがidでバリューがcompany_nameの値を取得
    public function getCompany() {
        $getCompanyName = Company::pluck('company_name', 'id');
        return $getCompanyName;
    }
    
}
