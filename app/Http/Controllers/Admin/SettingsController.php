<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Settings;
use App\Models\Language;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function save(Request $req)
    { 
        $languages = Language::all();
        foreach ($languages as $key => $lang) {
            Settings::where("language_id",$lang->id)->update([
                "language_id" => $lang->id,
                "site_logo" => $req->site_logo[$lang->id],
                "favicon" => $req->favicon[$lang->id],
                "meta_title" => $req->meta_title[$lang->id],
                "footer_left_content" => $req->footer_left_content[$lang->id],
                "footer_center_content" => $req->footer_center_content[$lang->id],
                "footer_left_title" => $req->footer_left_title[$lang->id],
                "footer_center_title" => $req->footer_center_title[$lang->id],
                "footer_menu_title" => $req->footer_menu_title[$lang->id],
                "meta_description" => $req->meta_description[$lang->id],
                "meta_keywords" => $req->meta_keywords[$lang->id],
                "facebook" => $req->facebook[$lang->id],
                "twitter" => $req->twitter[$lang->id],
                "instagram" => $req->instagram[$lang->id],
                "google" => $req->google[$lang->id],
                "whatsapp" => $req->whatsapp[$lang->id],
                "address" => $req->address[$lang->id],
                "gsm" => $req->gsm[$lang->id],
                "fax" => $req->fax[$lang->id],
                "email" => $req->email[$lang->id]
            ]);
        }
        return redirect("admin/settings");
    }
    public function settings(Request $req)
    {
        $languages = Language::all();
        foreach ($languages as $key => $lang) {
            $query = Settings::where("language_id", $lang->id)->first();
            if (!$query) {
                Settings::create([
                    "meta_title" => "Site Meta Title",
                    "language_id" => $lang->id
                ]);
            }
            $settings[$lang->id] = Settings::where("language_id", $lang->id)->first();
        }
        $data['settings'] = $settings;
        return view("Admin.settings")->with($data);
    }
}
