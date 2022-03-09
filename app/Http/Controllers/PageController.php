<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryDetails;
use App\Models\GalleryImages;
use App\Models\Language;
use App\Models\Module;
use App\Models\Page;
use App\Models\PageDetails;
use App\Models\PostDetails;
use App\Models\Slider;
use App\Models\SliderDetails;
use App\Models\SliderImages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getPage(Request $req)
    {
        if($req->lang_code){
            $language_id = Language::where("code", $req->lang_code)->first()->id;
            $page = PageDetails::where("slug", $req->slug)->first();
        }
 
        if ($req->lang) {
            $page = Page::where("home_page", 1)->first();
            if ($page) {
                $language_id = Language::where("code", $req->lang)->first()->id;
                $page = PageDetails::where("language_id", $language_id)->where("page_id", $page->id)->first();
            }
        }
        if ($page) {
            $page = Page::find($page->page_id);
            if ($page) {
                $page->title = PageDetails::where("page_id", $page->id)->where("language_id", $language_id)->first()->title;
                $modules = Module::where("page_id", $page->id)->orderBy("sort_order", "ASC")->get();
                foreach ($modules as $key2 => $module) {
                    if ($module->post_id) {
                        $modules[$key2]->post = PostDetails::where("language_id", $language_id)->where("post_id", $module->post_id)->first();
                    }
                    if ($module->gallery_id) {
                        $gallery = Gallery::find($module->gallery_id)->first();
                        $gallery_details = GalleryDetails::where("language_id", $language_id)->where("gallery_id", $module->gallery_id)->first();
                        $gallery->title = $gallery_details->title;
                        $gallery->description = $gallery_details->description;
                        $gallery->images = GalleryImages::where("language_id", $language_id)->where("gallery_id", $module->gallery_id)->get();
                        $modules[$key2]->gallery = $gallery;
                    }
                    if ($module->slider_id) {
                        $slider = Slider::find($module->slider_id)->first();
                        $slider_details = SliderDetails::where("language_id", $language_id)->where("slider_id", $module->slider_id)->first();
                        $slider->title = $slider_details->title;
                        $slider->description = $slider_details->description;
                        $slider->images = SliderImages::where("language_id", $language_id)->where("slider_id", $module->slider_id)->get();
                        $modules[$key2]->slider = $slider;
                    }
                }
                $page->modules = $modules;
            }
        }
        $data['page'] = $page;
        return view("page")->with($data);
    }
}
