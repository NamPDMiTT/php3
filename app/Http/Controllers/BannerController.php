<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    // List banner
    public function listBanner(Request $request)
    {
        $title = 'Banner List';
        $banners = Banner::all();
        if ($request->post() && $request->search) {
            $banners = DB::table('banners')->where('name', 'like', "%$request->search%")->get();
        }
        return view('banner.index', compact('title', 'banners'));
    }

    // Add banner
    public function addBanner(BannerRequest $request)
    {
        $title = 'Add Banner';
        if ($request->isMethod('POST')) {
            $banners = new Banner();
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            // dd($data);
            $banners->fill($data)->save();
            if ($banners->save()) {
                Session::flash('success', 'Add banner success!');
                return redirect()->route('list_banner');
            } else {
                Session::flash('error', 'Add banner fail!');
            }
        }
        return view('banner.add', compact('title'));
    }

    // Edit banner
    public function editBanner(BannerRequest $request, $id)
    {
        $title = 'Update Banner';
        $details = Banner::find($id);
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            $update = Banner::where('id', $id)->update($data);
            if ($update) {
                Session::flash('success', 'Update banner success!');
                return redirect()->route('list_banner');
            } else {
                Session::flash('error', 'Update banner fail!');
            }
        }
        return view('banner.edit', compact('title', 'details'));
    }

    // Delete banner
    public function deleteBanner($id)
    {
        if ($id) {
            $delete = Banner::where('id', $id)->delete();
            if ($delete) {
                Session::flash('success', 'Delete banner success!');
                return redirect()->route('list_banner');
            } else {
                Session::flash('error', 'Delete banner fail!');
            }
        }
        return;
    }
}
