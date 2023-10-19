<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if(auth()->user()->hasRole(['super-admin'])){
             $posts['posts'] = Post::with('user')->get();
         }
         if(auth()->user()->hasRole(['owner'])){
             $posts['posts'] = Post::with('user')->where('id' , '=' , auth()->user()->id)->get();
        }
        return view('post.index',$posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|unique:post|max:255',
            'body' => 'required',
        ];
        $messages = [
            'title.required' => 'يرجى تعبئة الحقل الخاص بعنوان المنشور',
            'body.required' => 'يرجى تعبئة الحقل الخاص  بمحتوى المنشور',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('postCreate')
            ->withErrors($validator)
            ->withInput();
        }else{
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = auth()->user()->id;
            if($post->save()){
                return redirect()->route('postCreate')->with('success', 'تمت عملية إضافة البيانات بنجاح');
            }else{
                return redirect()->route('postCreate')->with('error', 'حدوث خطأ اثناء عملية إضافة البيانات');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::FindOrFail($id);
        return view('post.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];
        $messages = [
            'title.required' => 'يرجى تعبئة الحقل الخاص بعنوان المنشور',
            'body.required' => 'يرجى تعبئة الحقل الخاص  بمحتوى المنشور',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('postEdit',['id' => $id])
            ->withErrors($validator)
            ->withInput();
        }else{
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;
            if($post->save()){
                return redirect()->route('postEdit',['id' => $id])->with('success', 'تمت عملية تحديث البيانات بنجاح');
            }else{
                return redirect()->route('postEdit',['id' => $id])->with('error', 'حدوث خطأ اثناء عملية تحديث البيانات');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where('id','=',$id)->delete();
          if($post){
                return redirect()->route('postsIndex')->with('success', 'تمت عملية حذف البيانات بنجاح');
            }else{
                return redirect()->route('postsIndex')->with('error', 'حدوث خطأ اثناء عملية حذف البيانات');
            }
    }
}
