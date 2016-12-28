<?php
/**
 * Created by PhpStorm.
 * User: Kuylim
 * Date: 12/28/2016
 * Time: 09:30
 */

namespace App\Http\Model;
use Eloquent;
use DB;
use Illuminate\Support\Facades\Input;

class Categories extends Eloquent
{
    protected $fillable = ['name','description', 'status'];

    public  function allCategories(){
        return self::all();
    }

    public function saveCategory(){
        $input = Input::all();
        $category = new Categories();
        $category->fill($input);
        $category->save();
        return $category;
    }

    public function getCategory($id){
        $category = self::find($id);
        if(is_null($category)){
            return false;
        }
        return $category;
    }

    public function deleteCategory($id){
        $category = self::find($id);
        if(is_null($category)){
            return false;
        }
        return $category->delete();
    }

    public function updateCategory($id){
        $category = self::find($id);
        if(is_null($category)){
            return false;
        }
        $input = Input::all();
        $category -> fill($input);
        $category -> save();
        return $category;
    }

    public function getCategoryName($name){
        $category = self::where('name', '=', $name) -> get();
        if(is_null($category)){
            return false;
        }
        return $category;
    }

    public function product(){
        return $this->hasMany('App\Http\Model\Products');
    }

    public function getProductByCategory($id){
        $category = self::find($id)->product;
        return $category;
    }
}