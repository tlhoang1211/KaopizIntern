<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(Request $request)
    {
        $posts = Post::query();
        $comments = Comment::query()->get();
//        dd($comments);
        $posts = $posts->where('status', '=', 1)->orderBy('id', 'desc')->paginate(5);
        return view('Query Builder Exercise.list', compact('posts', 'comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $title = $request->title;
        if ($title === 'null') {
            return redirect(route('posts_list'))->with('add_error', 'Title cannot be null!');
        }
        $post = $request->all();
        $post['status'] = 1;
        Post::create($post);
        return redirect(route('posts_list'))->with('add_success', 'New post was added successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ]
        );

        $post = Post::find($id);
        if (isset($post) && $post != null) {
            $post->title = $request->title;
            $post->content = $request->get('content');
            $post->updated_at = Carbon::now('Asia/Bangkok');
            $post->update();
            return redirect(route('posts_list'))->with('update_success', 'Update Successful!');
        }
        return view('Query Builder Exercise.list')->with('error', 'Something wrong!');
    }


    public function delete($id)
    {
        $post = Post::find($id);
        if (isset($post) && $post != null) {
            $post->status = 0;
            $post->update();
            return redirect(route('posts_list'))->with('delete_success', 'Delete Successful!');
        }
        return view('Query Builder Exercise.list')->with('error', 'Something wrong!');

    }
}

