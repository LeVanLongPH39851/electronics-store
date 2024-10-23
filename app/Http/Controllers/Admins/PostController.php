<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    protected $classActive = "Đơn Hàng";

    public function index()
    {
        $post = Post::all();
        $template = 'admins.posts.list';

        return view('admins.layout', [
            'title' => 'Danh Sách Bài Viết',
            'template' => $template,
            'classActive' => $this->classActive,
            'post' => $post
        ]);
    }

    public function create()
    {


        $template = "admins.posts.create";

        return view('admins.layout', [
            'title' => 'Tạo Mới Bài Viết',
            'template' => $template,
            'classActive' => $this->classActive,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'title' => $request->title,
            'image' => $imagePath,
            'content' => $request->input('content'),
        ]);

        return redirect()->route('post.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(string $id)
    {
        $post = Post::find($id); //Lấy post hiện tại

        if ($post) {

            $template = "admins.posts.edit";

            return view('admins.layout', [
                'title' => 'Sửa bài viết',
                'template' => $template,
                'classActive' => $this->classActive,
                'post' => $post,
            ]);
        }

        return redirect()->back()->with('error', 'Không tìm thấy hãng');
    }

    public function show(string $id)
    {

        $post = Post::find($id);

        if ($post) {

            $template = 'admins.posts.detail';

            return view('admins.layout', [
                'title' => 'Chi Tiết Bài Viết',
                'template' => $template,
                'classActive' => $this->classActive,
                'post' => $post,
            ]);
        }
        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
    }



    public function update(Request $request, string $id)
    {
        if ($request->isMethod("PUT")) {

            $request->validate([
                'title' => 'required',
                'content' => 'required',
                "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            ]);

            $post = Post::find($id);

            if ($post) {
                if ($request->hasFile('image')) {  //Nếu có ảnh
                    if ($post->image && Storage::disk('public')->exists($post->image)) { //Kiểm tra có image trong csdl và public hay không
                        Storage::disk('public')->delete($post->image); //Nếu có thì xóa ảnh đấy
                    }
                    $image = $request->file('image')->store("uploads/posts", "public"); //Lưu ảnh mới
                } else {
                    $image = $post->image; //Giữ lại ảnh cũ
                }

                //Cập nhật
                $post->title = $request->input('title');
                $post->content = $request->input('content');
                $post->image = $image;
                $post->save(); //Lưu

                return redirect()->route('post.index')->with('success', 'Cập nhật hãng thành công');
            }

            return redirect()->back()->with('error', 'Không tìm thấy hãng');
        }
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post) {

            if ($post->image && Storage::disk('public')->exists($post->image)) { //Nếu có ảnh thì xóa ảnh
                Storage::disk('public')->delete($post->image);
            }

            $post->delete(); //Xóa vĩnh viễn
            return redirect()->back()->with("success", "Xóa thành công");
        }

        return redirect()->back()->with("error", "Không tìm thấy bài viết");
    }
}
