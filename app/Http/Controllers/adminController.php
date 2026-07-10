<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->Search)){
            $Search = $request->Search;
        }else{
            $Search = "";
        }
        // 抓資料 ::paginate(3) 每頁三筆
        $admin = admin::where('aname', 'like', '%'.$Search.'%')->paginate(5)->withQueryString();
        return view('admin', compact('admin'))->with('searchKey', $Search);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 驗證欄位
        $request->validate([
            'aid' => 'required',
            'aname' => 'required',
            'passwd' => 'required',
        ]);
        // 存檔的動作
        admin::create($request->all());
        return redirect()->route('admin.index')->with('succes', '管理者新增單筆資料成功！人員：'.($request->aid));
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        return view('adminEdit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        // 驗證欄位
        $request->validate([
            'aid' => 'required',
            'aname' => 'required',
            'passwd' => 'required',
        ]);
        // 更新的動作
        $admin->update($request->all());
        return redirect()->route('admin.index')->with('succes', '管理者'.($request->aid).'資料修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('succes', '管理者'.($admin->aid).'資料刪除成功！');
    }
}
