<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Form;
use App\Models\Language;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $req){

    }
    public function add(){

    }
    public function insert(Request $req){
    $form=new Form();
    $form->sort_order=0;
    $form->save();
    $languages = Language::all();
    foreach($languages as $key => $lang){

    }
    }
}
