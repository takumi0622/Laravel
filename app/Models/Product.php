<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

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

    // Companiesテーブルと関連付ける
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
