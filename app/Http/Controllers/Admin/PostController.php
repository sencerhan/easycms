<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Module;
use App\Models\Admin\Post;
use App\Models\Admin\PostDetails;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $default_language_id = Language::where("default", 1)->first()->id;
        $posts = Post::all();
        foreach ($posts as $key => $post) {
            $posts[$key]->title = PostDetails::where("post_id", $post->id)->first()->title;
        }
        $data['posts'] = $posts;
        return view("Admin.post.index")->with($data);
    }
    public function add(Request $req)
    {
        return view("Admin.post.add");
    }
    public function edit(Request $req)
    {
        $post = Post::find($req->id);
        $languages = Language::all();
        foreach ($languages as $lang) {
            $query=PostDetails::where("post_id", $post->id)->where("language_id",$lang->id)->first();
            if(! $query){
             PostDetails::create([
                 "language_id"=>$lang->id,
                 "post_id"=>$req->id
             ]);
            }
            $post[$lang->id] = PostDetails::where("post_id", $post->id)->where("language_id",$lang->id)->first();
        }
        $data['post'] = $post;
        return view("Admin.post.edit")->with($data);
    }
    public function insert(Request $req)
    {
        $post = new Post;
        $post->save();
        $post_id = $post->id;
        foreach ($req->title as $language_id => $value) {
            $postdetails = new PostDetails();
            $postdetails->title = $value;
            $postdetails->content = $req->content[$language_id];
            $postdetails->language_id = $language_id;
            $postdetails->post_id = $post_id;
            $postdetails->save();
        }
        return redirect("admin/posts");
    }
    public function update(Request $req)
    {
        $post = Post::find($req->id);
        $post->save(); 
        foreach ($req->title as $language_id => $value) {
            $postdetails = PostDetails::where("language_id",$language_id)->where("post_id",$req->id)->first();
            if(! $postdetails){
                $postdetails = new PostDetails();
            }
            $postdetails->title = $value;
            $postdetails->content = $req->content[$language_id];
            $postdetails->language_id = $language_id;
            $postdetails->post_id = $req->id;
            $postdetails->save();
        }

        return redirect("admin/posts");
    }
    public function delete(Request $req)
    {
        $delete = Post::find($req->id)->delete();
        $delete = Module::where("post_id",$req->id)->delete();
        $delete = PostDetails::where("post_id", $req->id)->delete();
        return redirect("admin/posts");
    }
}
