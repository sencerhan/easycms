<?php

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\Page;
use App\Models\PageDetails;
use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;

class PreControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->lang_code) {
            $language = Language::where("code", $request->lang_code)->first();
            if ($language) {
                $language_id = $language->id;
            } else {
                $language_id = Language::where("default", 1)->first()->id;
            }
        }elseif($request->lang){
            $language = Language::where("code", $request->lang)->first();
            if ($language) {
                $language_id = $language->id;
            } 
        }else {
            $language = Language::where("default", 1)->first();
            $language_id = $language->id;
        }
        $data['lang_code']=$language->code;
        $settings = Settings::where("language_id", $language_id)->first();
        $data['settings'] = $settings;
        if ($request->slug) {
            $page = PageDetails::where("slug", $request->slug)->first();
            if ($page) {
                $languages = Language::all();
                foreach ($languages as $key => $lang) {
                    $pagedetails = PageDetails::where("page_id", $page->page_id)->where("language_id", $lang->id)->first();
                    if ($pagedetails) {
                        $languages[$key]->url = $lang->code . "/" . $pagedetails->slug;
                    }
                }
            }
        } else {
            $languages = Language::all();
            foreach ($languages as $key => $lang) {
                $languages[$key]->url = $lang->code;
            }
        }
        $pages = Page::where("main_menu", 1)->where("parent_id", null)->orWhere("parent_id", 0)->orderBy("sort_order", "asc")->get();
        foreach ($pages as $key => $page) {
            $details = PageDetails::where("page_id", $page->id)->where("language_id", $language_id)->first();
            $pages[$key]->title = $details->title;
            $pages[$key]->url = $language->code . "/" . $details->slug;
            $childs = Page::where("parent_id", $page->id)->orderBy("sort_order", "asc")->get();
            if ($childs->first()) {
                foreach ($childs as $key2 => $child) {
                    $details = PageDetails::where("page_id", $child->id)->where("language_id", $language_id)->first();
                    $childs[$key2]->title = $details->title;
                    $childs[$key2]->url = $language->code . "/" . $details->slug;

                    $grandchilds = Page::where("parent_id", $child->id)->orderBy("sort_order", "asc")->get();
                    if ($grandchilds->first()) {
                        foreach ($grandchilds as $key3 => $child) {
                            $details = PageDetails::where("page_id", $child->id)->where("language_id", $language_id)->first();
                            $grandchilds[$key3]->title = $details->title;
                            $grandchilds[$key3]->url = $language->code . "/" . $details->slug;
                        }

                        $childs[$key2]->childs = $grandchilds;
                    }
                }
                $pages[$key]->childs = $childs;
            }
        }
        $footerpages = Page::where("footer_menu", 1)->orderBy("sort_order", "asc")->get();
        foreach ($footerpages as $key => $page) {
            $details = PageDetails::where("page_id", $page->id)->where("language_id", $language_id)->first();
            $footerpages[$key]->title = $details->title;
            $footerpages[$key]->url = $language->code . "/" . $details->slug;
        }
        $data['menu'] = $pages;
        $data['footermenu'] = $footerpages;
        $data['languages'] = $languages;
        //dd($pages); exit;
        view()->share($data);
        return $next($request);
    }
}
