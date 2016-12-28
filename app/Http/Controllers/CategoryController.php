<?php
/**
 * Created by PhpStorm.
 * User: Kuylim
 * Date: 12/28/2016
 * Time: 09:43
 */

namespace App\Http\Controllers;
use App\Http\Model\Categories;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers
 */
class CategoryController extends ApiController
{
    protected $category = null;

    public function  __construct(Categories $category){
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/categories",
     *     description="Return all categories",
     *     operationId="findAllCategories",
     *     produces={"application/json"},
     *     tags={"Category"},
     *     @SWG\Response(
     *         response=200,
     *         description="Category Not Found"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function allCategories(){
        return response() -> json($this->category->allCategories(), 200);
    }

    /**
     * @SWG\Get(
     *     path="/categories/{id}",
     *     description="Returns a categories based on a single ID",
     *     operationId="findCategoryById",
     *     tags={"Category"},
     *     @SWG\Parameter(
     *         description="ID of category to fetch",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     produces={
     *         "application/json",
     *         "application/xml",
     *         "text/html",
     *         "text/xml"
     *     },
     *     @SWG\Response(
     *         response=200,
     *         description="category found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getCategory($id){
        $category = $this->category->getCategory($id);
        if(!$category){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json($category,200);
    }

    /**
     * @SWG\Post(
     *     path="/categories",
     *     operationId="addCategory",
     *     description="Add a new category.",
     *     produces={"application/json"},
     *     tags={"Category"},
     *     @SWG\Parameter(
     *         name="category",
     *         in="body",
     *         description="Category to add to the Database",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Save Category Success",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function saveCategory(){
        return response() -> json($this->category->saveCategory(), 200);
    }

    /**
     * @SWG\Put(
     *     path="/categories/{id}",
     *     operationId="updateCategory",
     *     description="Update old category.",
     *     produces={"application/json"},
     *     tags={"Category"},
     *     @SWG\Parameter(
     *         description="ID of category to update",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Parameter(
     *         name="category",
     *         in="body",
     *         description="Category to update to the database",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Save Category Success",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function updateCategory($id){
        $category = $this->category->updateCategory($id);
        if(!$category){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json($category,200);
    }

    /**
     * @SWG\Delete(
     *     path="/categories/{id}",
     *     description="deletes a single category based on the category id",
     *     operationId="deleteCategory",
     *     tags={"Category"},
     *     @SWG\Parameter(
     *         description="ID of category to delete",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="category deleted success"
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function deleteCategory($id){
        $category = $this->category->deleteCategory($id);
        if(!$category){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json(['response' => 'delete user success.'],200);
    }

    /**
     * @SWG\Get(
     *     path="/categories/search/{name}",
     *     description="Returns a category based on a name",
     *     operationId="findCategoryByName",
     *     tags={"Category"},
     *     @SWG\Parameter(
     *         description="name of category to fetch",
     *         format="String",
     *         in="path",
     *         name="name",
     *         required=true,
     *         type="String"
     *     ),
     *     produces={
     *         "application/json",
     *         "application/xml",
     *         "text/html",
     *         "text/xml"
     *     },
     *     @SWG\Response(
     *         response=200,
     *         description="category found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getCategoryName($name){
        $category = $this->category->getCategoryName($name);
        if(!$category){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json($category,200);
    }

    /**
     * @SWG\Get(
     *     path="/categories/search/{id}",
     *     description="Returns a list of product based on a category id",
     *     operationId="findProductByCategoryID",
     *     tags={"Category"},
     *     @SWG\Parameter(
     *         description="id of category to fetch products",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     produces={
     *         "application/json",
     *         "application/xml",
     *         "text/html",
     *         "text/xml"
     *     },
     *     @SWG\Response(
     *         response=200,
     *         description="products found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getProductByCategory($id){
        $category = $this->category->getProductByCategory($id);
        return response() -> json($category,200);
    }
}