<?php

namespace App\Http\Controllers;
use App\Http\Model\Users;
use App\Http\Controllers\ApiController;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends ApiController{

    protected $user = null;

    public function  __construct(Users $user){
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/users",
     *     description="Return all users",
     *     operationId="finadAllUser",
     *     produces={"application/json"},
     *     tags={"User"},
     *     @SWG\Response(
     *         response=200,
     *         description="User found"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function allUsers(){
        return response() -> json($this->user->allUsers(), 200);
    }


    /**
     * @SWG\Get(
     *     path="/users/{id}",
     *     description="Returns a user based on a single ID",
     *     operationId="findUserByID",
     *     tags={"User"},
     *     @SWG\Parameter(
     *         description="ID of user to fetch",
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
     *         description="user found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getUser($id){
        $user = $this->user->getUser($id);
        if(!$user){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json($user,200);
    }

    /**
     * @SWG\Post(
     *     path="/users",
     *     operationId="addUser",
     *     description="Creates a new user.",
     *     produces={"application/json"},
     *     tags={"User"},
     *     @SWG\Parameter(
     *         name="user",
     *         in="body",
     *         description="User to add to the Database",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Save User Success",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function saveUser(){
        return response() -> json($this->user->saveUser(), 200);
    }

    /**
     * @SWG\Put(
     *     path="/users/{id}",
     *     operationId="updateProduct",
     *     description="Update a old user.",
     *     produces={"application/json"},
     *     tags={"User"},
     *     @SWG\Parameter(
     *         description="ID of user to update",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Parameter(
     *         name="user",
     *         in="body",
     *         description="User to update to the database",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Save User Success",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function updateUser($id){
        $user = $this->user->updateUser($id);
        if(!$user){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json($user,200);
    }

    /**
     * @SWG\Delete(
     *     path="/users/{id}",
     *     description="deletes a single user based on the user id",
     *     operationId="deleteUser",
     *     tags={"User"},
     *     @SWG\Parameter(
     *         description="ID of user to delete",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="user deleted success"
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function deleteUser($id){
        $user = $this->user->deleteUser($id);
        if(!$user){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json(['response' => 'delete user success.'],200);
    }

    /**
     * @SWG\Get(
     *     path="/users/search/{email}",
     *     description="Returns a user based on a email",
     *     operationId="findUserByEmail",
     *     tags={"User"},
     *     @SWG\Parameter(
     *         description="Email of user to fetch",
     *         format="int64",
     *         in="path",
     *         name="email",
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
     *         description="user found",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function getUserEmail($email){
        $user = $this->user->getUserEmail($email);
        if(!$user){
            return response() -> json(['response' => 'User not found'], 400);
        }
        return response() -> json($user,200);
    }
}