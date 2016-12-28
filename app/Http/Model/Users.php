<?php
/**
 * Created by PhpStorm.
 * User: Kuylim
 * Date: 12/20/2016
 * Time: 15:08
 */

namespace  App\Http\Model;
use Eloquent;
use DB;
use Illuminate\Support\Facades\Input;

/**
 * Class Machine
 *
 * @package App\Http\Model
 *
 * @SWG\Definition(
 *   definition="User"
 * )
 *
 */
class Users extends Eloquent{

    protected $fillable = ['firstname','lastname','mobile','email', 'address', 'password', 'role', 'status'];

    public  function allUsers(){
        return self::all();
    }

    public function saveUser(){
        $input = Input::all();
        $user = new Users();
        $user->fill($input);
        $user->save();
        return $user;
    }

    public function getUser($id){
        $user = self::find($id);
        if(is_null($user)){
            return false;
        }
        return $user;
    }

    public function deleteUser($id){
        $user = self::find($id);
        if(is_null($user)){
            return false;
        }
        return $user->delete();
    }

    public function updateUser($id){
        $user = self::find($id);
        if(is_null($user)){
            return false;
        }
        $input = Input::all();
        $user -> fill($input);
        $user -> save();
        return $user;
    }

    public function getUserEmail($email){
        $user = self::where('email', '=', $email) -> get();
        if(is_null($user)){
            return false;
        }
        return $user;
    }
}