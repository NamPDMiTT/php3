<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    // List post
    public function listPost(Request $request)
    {
        $title = 'Post List';
        $posts = Post::all();
        if ($request->post() && $request->search) {
            $posts = DB::table('posts')->where('title', 'like', "%$request->search%")->get();
        }
        return view('post.index', compact('title', 'posts'));
    }

    // Add post
    public function addPost(PostRequest $request)
    {
        $title = 'Add Post';
        if ($request->isMethod('POST')) {
            $posts = new Post();
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            // dd($data);
            $posts->fill($data)->save();
            if ($posts->save()) {
                Session::flash('success', 'Add post success!');
                return redirect()->route('list_post');
            } else {
                Session::flash('error', 'Add post fail!');
            }
        }
        return view('post.add', compact('title'));
    }

    // Edit post
    public function editPost(PostRequest $request, $id)
    {
        $title = 'Update Post';
        $details = Post::find($id);
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            $update = Post::where('id', $id)->update($data);
            if ($update) {
                Session::flash('success', 'Update post success!');
                return redirect()->route('list_post');
            } else {
                Session::flash('error', 'Update post fail!');
            }
        }
        return view('post.edit', compact('title', 'details'));
    }

    // Delete post
    public function deletePost($id)
    {
        $delete = Post::where('id', $id)->delete();
        if ($delete) {
            Session::flash('success', 'Delete post success!');
        } else {
            Session::flash('error', 'Delete post fail!');
        }
        return redirect()->route('list_post');
    }
}
