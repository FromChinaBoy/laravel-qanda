<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/2
 * Time: 9:03 PM
 */

namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function index()
    {
        session('qanda','1');
        sleep(5);
        return session_id();
    }
}