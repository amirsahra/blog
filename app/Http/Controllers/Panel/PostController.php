<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Traits\Studiable;
use App\Traits\UploadImage;
use Config;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use UploadImage, Studiable;

    public function index()
    {
        if (auth()->user()->hasPermissionTo('read_post'))
            $posts = Post::orderBy('created_at', 'desc')
                ->paginate(Config::get('dornicasettings.paginate.post'));
        else
            $posts = Post::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'asc')->paginate(Config::get('dornicasettings.paginate.post'));

        return view('panel.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('panel.post.create', compact('categories'));
    }

    public function store(PostRequest $postRequest)
    {
        $post = $postRequest->all();

        if ($postRequest->has('image'))
            $post['image'] = $this->uploadImage($post['image'], 'post_image');

        $post['study_time'] = $this->calculationOfTextReadingTime($post['content']);
        $post['user_id'] = auth()->user()->id;
        //dd($post);
        Post::create($post);
        return redirect()->back()->with('success', 'Create post successfully');
    }


    public function edit(Post $post)
    {
        $data = [
            'categories' => Category::all(),
            'post' => $post
        ];
        return view('panel.post.edit', compact('data'));
    }

    public function update(PostRequest $postRequest, Post $post)
    {
        $postData = $postRequest->all();
        if ($postRequest->has('image'))
            $postData['image'] = $this->updateImage($postData['image'], 'post_image', $post->image);

        $post['study_time'] = $this->calculationOfTextReadingTime($post['content']);

        $post->update($postData);
        return redirect()->back()->with('success', 'Update post successfully');
    }

    public function destroy(Post $post)
    {
        try {
            if ((auth()->user()->id == $post->user_id) || auth()->user()->can('delete_post')) {
                $post->delete();
                return redirect()->back()->with('success', 'Update post successfully');
            } else {
                return redirect()->back()->with('error', __('messages.unauthorized'));
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Can not delete this category');
        }


    }
}
