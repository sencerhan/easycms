<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GalleryDetails;
use App\Models\Admin\Module;
use App\Models\Admin\Page;
use App\Models\Admin\PageDetails;
use App\Models\Admin\PostDetails;
use App\Models\Admin\SliderDetails;
use App\Models\Language;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $language_id = Language::where("default", 1)->first()->id;
        $pages = PageDetails::where("language_id", $language_id)->orderBy("title", "asc")->get();
        foreach ($pages as $key => $page) {
            $modules=Module::where("page_id",$page->page_id)->orderBy("sort_order","asc")->get();
            if($modules->first()){
                foreach ($modules as $key2 => $module) {
                    if ($module->post_id) {
                        $modules[$key2]->type="Post";
                        $modules[$key2]->title = PostDetails::where("language_id", $language_id)->where("post_id", $module->post_id)->first()->title;
                    }
                    if ($module->gallery_id) {
                        $modules[$key2]->type="Gallery";
                        $modules[$key2]->title = GalleryDetails::where("language_id", $language_id)->where("gallery_id", $module->gallery_id)->first()->title;
                    }
                    if ($module->slider_id) {
                        $modules[$key2]->type="Slider";
                        $modules[$key2]->title = SliderDetails::where("language_id", $language_id)->where("slider_id", $module->slider_id)->first()->title;
                    }
                }
            }
            $pages[$key]->modules=$modules;
        }
        $data['pages'] = $pages;
        return view("Admin.index")->with($data);
    }
}
