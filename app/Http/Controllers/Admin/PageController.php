<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GalleryDetails;
use App\Models\Admin\Language;
use App\Models\Admin\Module;
use App\Models\Admin\Page;
use App\Models\Admin\PageDetails;
use App\Models\Admin\Post;
use App\Models\Admin\PostDetails;
use App\Models\Admin\SliderDetails;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $language_id = Language::where("default", 1)->first()->id;
        $pages = Page::all();
        foreach ($pages as $key => $page) {
            $pages[$key]->title = PageDetails::where("page_id", $page->id)->first()->title;
            $modules = Module::where("page_id", $page->id)->orderBy("sort_order", "ASC")->get();
            foreach ($modules as $key2 => $module) {
                if ($module->post_id) {
                    $modules[$key2]->title = PostDetails::where("language_id", $language_id)->where("post_id", $module->post_id)->first()->title;
                }
                if ($module->gallery_id) {
                    $modules[$key2]->title = GalleryDetails::where("language_id", $language_id)->where("gallery_id", $module->gallery_id)->first()->title;
                }
                if ($module->slider_id) {
                    $modules[$key2]->title = SliderDetails::where("language_id", $language_id)->where("slider_id", $module->slider_id)->first()->title;
                }
            }
            $pages[$key]->modules=$modules;
        }
        $data['pages'] = $pages;
        return view("Admin.page.index")->with($data);
    }
    public function add(Request $req)
    {
        $language=Language::where("default",1)->first();
        $pages=PageDetails::where("language_id",$language->id)->orderBy("title","asc")->get();
        $data['pages']=$pages;
        return view("Admin.page.add")->with($data);
    }
    public function edit(Request $req)
    {
        $page = Page::find($req->id);
        $languages = Language::all();
        foreach ($languages as $lang) {
            $query = PageDetails::where("page_id", $page->id)->where("language_id", $lang->id)->first();
            if (!$query) {
                PageDetails::create([
                    "language_id" => $lang->id,
                    "page_id" => $req->id
                ]);
            }
            $page[$lang->id] = PageDetails::where("page_id", $page->id)->where("language_id", $lang->id)->first();
        }
        $data['page'] = $page;
        $language=Language::where("default",1)->first();
        $pages=PageDetails::where("language_id",$language->id)->orderBy("title","asc")->get();
        $data['pages']=$pages;
        return view("Admin.page.edit")->with($data);
    }
    public function insert(Request $req)
    {
        if($req->home_page){
            Page::where("id",">",0)->update([
                "home_page"=>0
            ]); 
         }
        $page = new Page;
        $page->main_menu = $req->main_menu;
        $page->footer_menu = $req->footer_menu;
        $page->home_page = $req->home_page;
        $page->sort_order = $req->sort_order;
        $page->parent_id = $req->parent_id;
        $page->save();
        $page_id = $page->id;
        foreach ($req->title as $language_id => $value) {
            $pagedetails = new PageDetails();
            $pagedetails->title = $value;
            $pagedetails->meta_title = $req->meta_title[$language_id];
            $pagedetails->meta_keywords = $req->meta_keywords[$language_id];
            $pagedetails->meta_description = $req->meta_description[$language_id];
            $pagedetails->slug = $req->slug[$language_id];
            $pagedetails->language_id = $language_id;
            $pagedetails->page_id = $page_id;
            $pagedetails->save();
        }
        return redirect("admin/pages");
    }
    public function update(Request $req)
    {
        if($req->home_page){
           Page::where("id",">",0)->update([
               "home_page"=>0
           ]); 
        }
        $page = Page::find($req->id);
        $page->main_menu = $req->main_menu;
        $page->footer_menu = $req->footer_menu;
        $page->home_page = $req->home_page;
        $page->sort_order = $req->sort_order;
        $page->parent_id = $req->parent_id;
        $page->save();
        foreach ($req->title as $language_id => $value) {
            $pagedetails = PageDetails::where("language_id", $language_id)->where("page_id", $req->id)->first();
            if (!$pagedetails) {
                $pagedetails = new PageDetails();
            }
            $pagedetails->title = $value;
            $pagedetails->meta_title = $req->meta_title[$language_id];
            $pagedetails->meta_keywords = $req->meta_keywords[$language_id];
            $pagedetails->meta_description = $req->meta_description[$language_id];
            $pagedetails->slug = $req->slug[$language_id];
            $pagedetails->language_id = $language_id;
            $pagedetails->page_id = $req->id;
            $pagedetails->save();
        }

        return redirect("admin/pages");
    }
    public function delete(Request $req)
    {
        $delete = Page::find($req->id)->delete();
        $delete = PageDetails::where("page_id", $req->id)->delete();
        return redirect("admin/pages");
    }
}
