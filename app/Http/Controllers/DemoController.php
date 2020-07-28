<?php

namespace Inicio\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller{
    
    function index(){
        return "ERES EL ADMIN DEL SISTEMA";
    }

}
