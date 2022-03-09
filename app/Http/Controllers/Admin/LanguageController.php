<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{
    public function index(Request $req)
    {
        $languages = Language::all();
        $data['languages'] = $languages;
        return view("Admin.language.index")->with($data);
    }
    public function add(Request $req)
    {
        return view("Admin.language.add");
    }
    public function edit(Request $req)
    {
        $language = Language::find($req->id);
        $data['language'] = $language;
        return view("Admin.language.edit")->with($data);
    }
    public function insert(Request $req)
    {
        $language = new Language;
        $language->name = $req->name;
        $language->code = $req->code;
        $language->flag = $req->flag;
        $language->save();
        return redirect("admin/languages");
    }
    public function update(Request $req)
    {
        $language = Language::find($req->id);
        $language->name = $req->name;
        $language->code = $req->code;
        $language->flag = $req->flag;
        $language->save();
        return redirect("admin/languages");
    }
    public function delete(Request $req)
    {
        Language::find($req->id)->delete();
        return redirect("admin/languages");
    }
}
