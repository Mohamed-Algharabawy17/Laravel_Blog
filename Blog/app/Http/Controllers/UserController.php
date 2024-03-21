<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\StorePostRequest;


class UserController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')-> paginate(5);
        return view('post_view.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('post_view.show', ['post'=> $post]);
    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('post_view.edit',['post'=> $post]);
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('post_view.trash', ['posts'=> $posts]);
    }


    /******************************************* Next lec functions *****************************************/

    public function create()
    {
        return view('post_view.create', ['users' => User::all()]);
    }
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        $post = Post::create($data);

        return redirect()->route('posts.index',['post', $post->id]);
    }

    public function update(Request $request, string $id)
    {
        Post::where('id', $id)->update($request->only(['title','body','enabled']));
        return redirect()->route('posts.index');
    }

    /******************************* Handling Deleting Posts *****************************/
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function restore(string $id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();

        return redirect()->route('posts.index')->with('success', 'Post restored successfully :)');
    }

    public function force_delete(string $id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->forceDelete();
        return redirect()->route('posts.trash')->with('success','Post successfully deleted permanently :)');
    }

    /**************************************** Count user's posts ********************************************/

    public function count(Request $request)
    {
        $users = User::paginate(5);
        $userCounts = [];
        foreach ($users as $user) {
            $userCounts[$user->id] = Post::where('user_id', $user->id)->count();
        }
        return view('post_view.count', ['userCounts' => $userCounts, 'users' => $users]);
    }

    public function show_all_posts(User $user)
    {

        $userPosts = Post::where('user_id', $user->id)->paginate(5);

        return view('post_view.user_posts', ['userPosts' => $userPosts]);
    }


}
