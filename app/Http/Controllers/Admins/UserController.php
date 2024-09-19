<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $classActive = "Users"; //Dùng để thêm class text-primary thẻ thẻ <li> ở sidebar

    public function index(Request $request)
    {   
        $roles = Role::get(); //Lấy danh sách vai trò
        
        //Lấy danh sách user xếp theo created_at desc, nếu created_at = nhau thì lấy theo id desc
        $users = User::with('role') //Kết nối với roles
        ->where("role_id", $request->input("role") && $request->input("role") != 0 ? $request->input("role") : ">", 0) //Filter theo vai trò
        ->where(function($query) use ($request) {
            $query->where("name", "LIKE", $request->input("keyWord") ? "%".$request->input("keyWord")."%" : "%") //Filter theo tên user
            ->orWhere("user_code", "LIKE", $request->input("keyWord") ? "%".$request->input("keyWord")."%" : "%"); //Filter theo mã user
        })
        ->orderBy("created_at", $request->input("orderBy") && $request->input("orderBy") === "oldest" ? "asc" : "desc") //Filter theo mới, cũ nhất
        ->orderBy('id', $request->input("orderBy") && $request->input("orderBy") === "oldest" ? "asc" : "desc") //Filter theo mới, cũ nhất
        ->paginate($request->input("perPage") ? $request->input("perPage") : 8); //Lấy bao nhiêu bản ghi
        
        $template = 'admins.users.list'; //Tạo biến template để include vào content của layout

        return view('admins.layout',
        ['title' => 'Users',
         'template' => $template,
         'classActive' => $this->classActive,
         'users' => $users,
         'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}