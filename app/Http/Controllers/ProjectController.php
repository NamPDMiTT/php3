<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    // List project
    public function listProject(Request $request)
    {
        $title = 'Project List';
        $projects = Project::all();
        if ($request->post() && $request->search) {
            $projects = DB::table('projects')->where('project_name', 'like', "%$request->search%")->get();
        }
        return view('project.index', compact('title', 'projects'));
    }

    // Add project
    public function addProject(ProjectRequest $request)
    {
        $title = 'Add Project';
        if ($request->isMethod('POST')) {
            $projects = new Project();
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            // dd($data);
            $projects->fill($data)->save();
            if ($projects->save()) {
                Session::flash('success', 'Add project success!');
                return redirect()->route('list_project');
            } else {
                Session::flash('error', 'Add project fail!');
            }
        }
        return view('project.add', compact('title'));
    }

    // Edit project
    public function editProject(ProjectRequest $request, $id)
    {
        $title = 'Update Project';
        $details = Project::find($id);
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            $update = Project::where('id', $id)->update($data);
            if ($update) {
                Session::flash('success', 'Update project success!');
                return redirect()->route('list_project');
            } else {
                Session::flash('error', 'Update project fail!');
            }
        }
        return view('project.edit', compact('title', 'details'));
    }

    // Delete project
    public function deleteProject($id)
    {
        $delete = Project::where('id', $id)->delete();
        if ($delete) {
            Session::flash('success', 'Delete project success!');
        } else {
            Session::flash('error', 'Delete project fail!');
        }
        return redirect()->route('list_project');
    }
}
