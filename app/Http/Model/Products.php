<?php
/**
 * Created by PhpStorm.
 * User: Kuylim
 * Date: 12/28/2016
 * Time: 07:58
 */

namespace App\Http\Model;
use Eloquent;
use DB;
use Illuminate\Support\Facades\Input;

class Products extends Eloquent
{
    protected $fillable = ['name','image','description','unit_price', 'amount', 'status', 'categories_id'];

    public  function allProducts(){
        return self::all();
    }

    public function saveProduct(){
        $input = Input::all();
        $product = new Products();
        $product->fill($input);
        $product->save();
        return $product;
    }

    public function getProduct($id){
        $product = self::find($id);
        if(is_null($product)){
            return false;
        }
        return $product;
    }

    public function deleteProduct($id){
        $product = self::find($id);
        if(is_null($product)){
            return false;
        }
        return $product->delete();
    }

    public function updateProduct($id){
        $product = self::find($id);
        if(is_null($product)){
            return false;
        }
        $input = Input::all();
        $product -> fill($input);
        $product -> save();
        return $product;
    }

    public function getProductName($name){
        $product = self::where('name', '=', $name) -> get();
        if(is_null($product)){
            return false;
        }
        return $product;
    }
}