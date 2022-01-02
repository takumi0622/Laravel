<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        //バリデーション
        return [
            'product_name' => ['required', 'string', 'max:64'],
            'company_id' => ['required',],
            'price' => ['required', 'int'],
            'stock' => ['required', 'int'],
            'comment' => ['max:255'],
        ];
    }

    // $table->bigIncrements('id');
    // $table->bigInteger('company_id')->unsigned();
    // $table->string('product_name');
    // $table->integer('price');
    // $table->integer('stock');
    // $table->text('comment');
    // $table->string('image_path');
    // $table->timestamps();
}
