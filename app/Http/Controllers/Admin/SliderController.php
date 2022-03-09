<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use App\Models\Admin\SliderDetails;
use App\Models\Admin\SliderImages;
use App\Models\Admin\Language;
use App\Models\Admin\Module;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $default_language_id = Language::where("default", 1)->first()->id;
        $sliders = Slider::all();
        foreach ($sliders as $key => $slider) {
            $sliders[$key]->title = SliderDetails::where("slider_id", $slider->id)->first()->title;
        }
        $data['sliders'] = $sliders;
        return view("Admin.slider.index")->with($data);
    }
    public function add(Request $req)
    {
        return view("Admin.slider.add");
    }
    public function edit(Request $req)
    {
        $slider = Slider::find($req->id);
        $languages = Language::all();
        foreach ($languages as $lang) {
            $query = SliderDetails::where("slider_id", $slider->id)->where("language_id", $lang->id)->first();
            if (!$query) {
                SliderDetails::create([
                    "language_id" => $lang->id,
                    "slider_id" => $req->id
                ]);
            }
            $slider[$lang->id] = SliderDetails::where("slider_id", $slider->id)->where("language_id", $lang->id)->first();
            $slider[$lang->id]->images = SliderImages::where("slider_id", $req->id)->where("language_id", $lang->id)->get();
        }

        $data['slider'] = $slider;
        return view("Admin.slider.edit")->with($data);
    }
    public function insert(Request $req)
    {
        $slider = new Slider;
        $slider->save();
        $slider_id = $slider->id;
        foreach ($req->title as $language_id => $value) {
            $sliderdetails = new SliderDetails();
            $sliderdetails->title = $value;
            $sliderdetails->description = $req->description[$language_id];
            $sliderdetails->slider_id = $slider_id;
            $sliderdetails->language_id = $language_id;
            $sliderdetails->save();
        }
        $languages = Language::all();
        if ($req->urls) {

            foreach ($languages as $lang) {
                if (isset($req->urls[$lang->id])) {
                    foreach ($req->urls[$lang->id] as $key => $src) {
                        $image = new SliderImages();
                        $image->src = $src;
                        $image->slider_id = $slider_id;
                        $image->language_id = $lang->id;
                        if (isset($req->titles[$lang->id][$key])) {
                            $image->title = $req->titles[$lang->id][$key];
                        }
                        if (isset($req->descriptions[$lang->id][$key])) {
                            $image->description = $req->descriptions[$lang->id][$key];
                        }
                        if (isset($req->links[$lang->id][$key])) {
                            $image->link = $req->links[$lang->id][$key];
                        }
                        $image->save();
                    }
                }
            }
        }
        return redirect("admin/sliders");
    }
    public function update(Request $req)
    {
        $slider = Slider::find($req->id);
        $slider_id = $slider->id;
        foreach ($req->title as $language_id => $value) {
            $sliderdetails = SliderDetails::where("slider_id", $req->id)->where("language_id", $language_id)->first();
            $sliderdetails->title = $value;
            $sliderdetails->description = $req->description[$language_id];
            $sliderdetails->slider_id = $slider_id;
            $sliderdetails->language_id = $language_id;
            $sliderdetails->save();
        }
        $languages = Language::all();
        SliderImages::where("slider_id", $req->id)->delete();
        if ($req->urls) {
            foreach ($languages as $lang) {
                if (isset($req->urls[$lang->id])) {
                    foreach ($req->urls[$lang->id] as $key => $src) {
                        $image = new SliderImages();
                        $image->src = $src;
                        $image->slider_id = $slider_id;
                        $image->language_id = $lang->id;
                        if (isset($req->titles[$lang->id][$key])) {
                            $image->title = $req->titles[$lang->id][$key];
                        }
                        if (isset($req->descriptions[$lang->id][$key])) {
                            $image->description = $req->descriptions[$lang->id][$key];
                        }
                        if (isset($req->links[$lang->id][$key])) {
                            $image->link = $req->links[$lang->id][$key];
                        }
                        $image->save();
                    }
                }
            }
        }
        return redirect("admin/sliders");
    }
    public function delete(Request $req)
    {
        $delete = Slider::find($req->id)->delete();
        $delete = Module::where("gallery_id",$req->id)->delete();
        $delete = SliderDetails::where("slider_id", $req->id)->delete();
        $delete = SliderImages::where("slider_id", $req->id)->delete();
        return redirect("admin/sliders");
    }
}
