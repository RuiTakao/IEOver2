<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Laravel\Ui\Presets\React;

class PostSearchController extends Controller
{

    public function search(){

        function url($param){
            return  [
                'js' => asset('js/' . $param . '/app.js'),
                'css' => asset('css/' . $param . '/app.css'),
            ];
        }

        return view('search.index', ['url' => url('search')] );
    }
}
