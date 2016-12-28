<?php
/**
 * Created by PhpStorm.
 * User: Kuylim
 * Date: 12/28/2016
 * Time: 11:36
 */

namespace App\Http\Controllers;


/**
 * Class ApiController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     host="laravel.dev",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="Online Shopper",
 *         @SWG\Contact(name="E4 Class G17 Group ?", url="https://www.kuylim.wordpress.com"),
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */
class ApiController extends Controller
{
}