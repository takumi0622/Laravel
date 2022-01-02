<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'sales';

    // 可変項目
    protected $fillable =
    [
        'product_id'
    ];
}
