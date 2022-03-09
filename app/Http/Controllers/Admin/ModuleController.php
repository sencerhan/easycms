<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryDetails;
use App\Models\Admin\Language;
use App\Models\Admin\Module;
use App\Models\Admin\Post;
use App\Models\Admin\PostDetails;
use App\Models\Admin\Slider;
use App\Models\Admin\SliderDetails;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function deleteModule(Request $req){
        $delete=Module::find($req->id)->delete();
        $data['status']="ok";
        echo json_encode($data);
    }
    public function postToPage(Request $req)
    {
        $posts = Post::all();
        $language_id = Language::where("default", 1)->first()->id;
        foreach ($posts as $key => $post) {
            $posts[$key]->title = PostDetails::where("post_id", $post->id)->where("language_id", $language_id)->first()->title;
        }
        $data['posts'] = $posts;
        $data['page_id'] = $req->page_id;
        return view("Admin.modules.post_to_page")->with($data);
    }
    public function postToPageSave(Request $req)
    {
        $module = new Module();
        $module->post_id = $req->post_id;
        $module->page_id = $req->page_id;
        $module->save();
        return redirect("/admin");
    }
    public function galleryToPage(Request $req)
    {
        $galleries = Gallery::all();
        $language_id = Language::where("default", 1)->first()->id;
        foreach ($galleries as $key => $gallery) {
            $galleries[$key]->title = GalleryDetails::where("gallery_id", $gallery->id)->where("language_id", $language_id)->first()->title;
        }
        $data['galleries'] = $galleries;
        $data['page_id'] = $req->page_id;
        return view("Admin.modules.gallery_to_page")->with($data);
    }
    public function galleryToPageSave(Request $req)
    {

        $module = new Module();
        $module->gallery_id = $req->gallery_id;
        $module->page_id = $req->page_id;
        $module->save();
        return redirect("/admin");
    }
    public function sliderToPage(Request $req)
    {
        $sliders = Slider::all();
        $language_id = Language::where("default", 1)->first()->id;
        foreach ($sliders as $key => $slider) {
            $sliders[$key]->title = SliderDetails::where("slider_id", $slider->id)->where("language_id", $language_id)->first()->title;
        }
        $data['sliders'] = $sliders;
        $data['page_id'] = $req->page_id;
        return view("Admin.modules.slider_to_page")->with($data);
    }
    public function sliderToPageSave(Request $req)
    {
        $module = new Module();
        $module->slider_id = $req->slider_id;
        $module->page_id = $req->page_id;
        $module->save();
        return redirect("/admin");
    }
    public function moduleToPage(Request $req)
    {
        $update = Module::find($req->module_id);
        $update->page_id = $req->page_id;
        $update->save();
        $i = 0;
        foreach ($req->modulelist as $module_id) {
            Module::find($module_id)->update([
                "sort_order" => $i
            ]);
            $i++;
        }
        if ($update) {
            $data['message'] = "ok";
        } else {
            $data['message'] = "fail";
        }
        echo json_encode($data);
    }
}
