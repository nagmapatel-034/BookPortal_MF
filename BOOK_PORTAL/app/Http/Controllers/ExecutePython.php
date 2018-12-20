<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 180); //3 minutes

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class ExecutePython extends Controller
{
    public function executePython(){

        if(Auth::check()){
                $user_id = Auth::id();
        }
        else
        $user_id = 13;
 
        $reco = shell_exec("python C:/Users/syfqh/PycharmProjects/testSimple/svd_deploy.py $user_id");
        #$pieces = explode(" ", $reco);
    return $reco; 
    }

    public function re_train(){
        $pieces = shell_exec("python C:/Users/syfqh/PycharmProjects/testSimple/svd_dev.py");
    return $pieces;
    
    }
}