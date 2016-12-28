<?php
/**
 * Created by PhpStorm.
 * User: Kuylim
 * Date: 12/28/2016
 * Time: 08:12
 */

namespace App\Http\Controllers;
use App\Http\Model\Products;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers
 */
class ProductController extends ApiController
{
    protected $product = null;

    public function  __construct(Products $product){
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/products",
     *     description="Return all products",
     *     operationId="finadAllProduct",
     *     produces={"application/json"},
     *     tags={"Product"},
     *     @SWG\Response(
     *         response=200,
     *         description="Product Not Found"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function allProducts(){
        return response() -> json($this->product->allProducts(), 200);
    }

    /**
     * @SWG\Get(
     *     path="/products/{id}",
     *     description="Returns a product based on a single ID",
     *     operationId="findProductById",
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         description="ID of product to fetch",
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
     *         description="product found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getProduct($id){
        $product = $this->product->getProduct($id);
        if(!$product){
            return response() -> json(['response' => 'Product not found'], 400);
        }
        return response() -> json($product,200);
    }

    /**
     * @SWG\Post(
     *     path="/products",
     *     operationId="addProduct",
     *     description="Add a new product.",
     *     produces={"application/json"},
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         name="product",
     *         in="body",
     *         description="Product to add to the Database",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Save Product Success",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function saveProduct(){
        return response() -> json($this->product->saveProduct(), 200);
    }

    /**
     * @SWG\Put(
     *     path="/products/{id}",
     *     operationId="updateProduct",
     *     description="Update old product.",
     *     produces={"application/json"},
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         description="ID of product to update",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Parameter(
     *         name="user",
     *         in="body",
     *         description="Product to update to the database",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Save Product Success",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function updateProduct($id){
        $product = $this->product->updateProduct($id);
        if(!$product){
            return response() -> json(['response' => 'Product not found'], 400);
        }
        return response() -> json($product,200);
    }

    /**
     * @SWG\Delete(
     *     path="/products/{id}",
     *     description="deletes a single product based on the product id",
     *     operationId="deleteProduct",
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         description="ID of product to delete",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="product deleted success"
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function deleteProduct($id){
        $product = $this->product->deleteProduct($id);
        if(!$product){
            return response() -> json(['response' => 'Product not found'], 400);
        }
        return response() -> json(['response' => 'delete product success.'],200);
    }

    /**
     * @SWG\Get(
     *     path="/products/search/{name}",
     *     description="Returns a product based on a name",
     *     operationId="findProductByName",
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         description="name of product to fetch",
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
     *         description="product found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getProductName($name){
        $product = $this->product->getProductName($name);
        if(!$product){
            return response() -> json(['response' => 'Product not found'], 400);
        }
        return response() -> json($product,200);
    }
}