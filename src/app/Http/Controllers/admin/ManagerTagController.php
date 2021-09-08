<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\AddTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\ImportRequest;
use Illuminate\Support\Str;
use DB;
use App\Exports\TagExport;
use App\Imports\TagImport;
use Maatwebsite\Excel\Facades\Excel;

class ManagerTagController extends Controller
{
    public function index()
    {
        $OBJ_Tags = Tag::orderBy('id','desc')->get();
        return view('admin.tag.index-tag',compact('OBJ_Tags'));
    }

    public function create()
    {
        return view('admin.tag.add-tag');
    }

    public function store(AddTagRequest $request)
    {
        DB::beginTransaction();
        try {
            $OBJ_Tag = new Tag($request->all());
            $OBJ_Tag->slug = Str::slug($request->name);
            $OBJ_Tag->save();
            DB::commit();
            alert()->success(__('custom.Notification'), __('custom.Add tag successful'));
        }
        catch (Exception $ex) {
            DB::rollBack();
            toast(__('custom.Add tag failed'), 'error');
        }
        return redirect()->back();
    }

    public function showOrHidden(Request $request,$id_tag)
    {
        DB::beginTransaction();
        try {
            $updateStatusTag = Tag::find($id_tag)->update($request->all());
            if($request->has('btn_show')){
                alert()->success(__('custom.Notification'), __('custom.Show successful tag'));
            }
            else
            {
                alert()->success(__('custom.Notification'), __('custom.Hidden successful tag'));
            }
            DB::commit();
        }
        catch (Exception $ex) {
            DB::rollBack();
            toast(__('custom.Update status tag failed'), 'error');
        }
        return redirect()->back();
    }

    public function edit($id_tag)
    {
        $OBJ_Tag_edit = Tag::find($id_tag);
        return view('admin.tag.edit-tag',compact('OBJ_Tag_edit'));
    }

    public function update(UpdateTagRequest $request, $id_tag)
    {
        DB::beginTransaction();
        try {
            $OBJ_Tag_update = Tag::find($id_tag)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            DB::commit();
            alert()->success(__('custom.Notification'), __('custom.Update tag successful'));
        }
        catch (Exception $ex) {
            DB::rollBack();
            toast(__('custom.Update tag failed'), 'error');
        }
        return redirect('/admin/tag');
    }

    public function destroy($id_tag)
    {
        try {
            Tag::destroy($id_tag);
            alert()->success(__('custom.Notification'), __('custom.Delete tag successful'));
        } catch (Exception $ex) {
            toast(__('custom.Delete tag failed'), 'error');
        }
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new TagExport, 'tag.xlsx');
    }

    public function import(ImportRequest $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new TagImport, $request->file('file'));
            alert()->success(__('custom.Notification'), __('custom.Import excel successful'));
            DB::commit();
        } catch (Exception $ex) {
            toast(__('custom.Import excel failed'), 'error');
            DB::rollBack();
        }
        return redirect()->back();
    }
}
