<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryDetails;
use App\Models\Admin\GalleryImages;
use App\Models\Admin\Language;
use App\Models\Admin\Module;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $default_language_id = Language::where("default", 1)->first()->id;
        $galleries = Gallery::all();
        foreach ($galleries as $key => $gallery) {
            $galleries[$key]->title = GalleryDetails::where("gallery_id", $gallery->id)->first()->title;
        }
        $data['galleries'] = $galleries;
        return view("Admin.gallery.index")->with($data);
    }
    public function add(Request $req)
    {
        return view("Admin.gallery.add");
    }
    public function edit(Request $req)
    {
        $gallery = Gallery::find($req->id);
        $languages = Language::all();
        foreach ($languages as $lang) {
            $query = GalleryDetails::where("gallery_id", $gallery->id)->where("language_id", $lang->id)->first();
            if (!$query) {
                GalleryDetails::create([
                    "language_id" => $lang->id,
                    "gallery_id" => $req->id
                ]);
            }
            $gallery[$lang->id] = GalleryDetails::where("gallery_id", $gallery->id)->where("language_id", $lang->id)->first();
            $gallery[$lang->id]->images = GalleryImages::where("gallery_id", $req->id)->where("language_id", $lang->id)->get();
        }

        $data['gallery'] = $gallery;
        return view("Admin.gallery.edit")->with($data);
    }
    public function insert(Request $req)
    {
        $gallery = new Gallery;
        $gallery->save();
        $gallery_id = $gallery->id;
        foreach ($req->title as $language_id => $value) {
            $gallerydetails = new GalleryDetails();
            $gallerydetails->title = $value;
            $gallerydetails->description = $req->description[$language_id];
            $gallerydetails->gallery_id = $gallery_id;
            $gallerydetails->language_id = $language_id;
            $gallerydetails->save();
        }
        $languages = Language::all();
        if ($req->urls) {

            foreach ($languages as $lang) {
                if (isset($req->urls[$lang->id])) {
                    foreach ($req->urls[$lang->id] as $key => $src) {
                        $image = new GalleryImages();
                        $image->src = $src;
                        $image->gallery_id = $gallery_id;
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
        return redirect("admin/galleries");
    }
    public function update(Request $req)
    {
        $gallery = Gallery::find($req->id);
        $gallery_id = $gallery->id;
        foreach ($req->title as $language_id => $value) {
            $gallerydetails = GalleryDetails::where("gallery_id", $req->id)->where("language_id", $language_id)->first();
            $gallerydetails->title = $value;
            $gallerydetails->description = $req->description[$language_id];
            $gallerydetails->gallery_id = $gallery_id;
            $gallerydetails->language_id = $language_id;
            $gallerydetails->save();
        }
        $languages = Language::all();
        GalleryImages::where("gallery_id", $req->id)->delete();
        if ($req->urls) {
            foreach ($languages as $lang) {
                if (isset($req->urls[$lang->id])) {
                    foreach ($req->urls[$lang->id] as $key => $src) {
                        $image = new GalleryImages();
                        $image->src = $src;
                        $image->gallery_id = $gallery_id;
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
        return redirect("admin/galleries");
    }
    public function delete(Request $req)
    {
        $delete = Gallery::find($req->id)->delete();
        $delete = Module::where("gallery_id",$req->id)->delete();
        $delete = GalleryDetails::where("gallery_id", $req->id)->delete();
        $delete = GalleryImages::where("gallery_id", $req->id)->delete();
        return redirect("admin/galleries");
    }
}
