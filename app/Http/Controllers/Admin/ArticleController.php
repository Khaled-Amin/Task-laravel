<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // protected $articlemodel;

    // public function __construct(Article $article)
    // {
    //     $this->articlemodel = $article;
    // }

    public function index()
    {
        $article = Article::all();
        return view('admin.articles.index', compact('article'));
    }
    public function create()
    {
        return view('admin.articles.create');
    }

    // create post
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'descr' => 'required',
        ]);

        if($validated) {
            $article = Article::create([
                'title' => $request->title,
                'descr' => $request->descr,
            ]);
            $article->update(['user_id' => Auth::guard('admin')->user()->id]);
            // dd($data);
            return redirect('admin/articles')->with('msg', 'Article Added Successfully');
        }
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $this->authorize('update', $article);
        return view('admin.articles.edit', compact('article'));
    }

    // create post
    public function update(Request $request, $id) {
        $article = Article::find($id);
        $this->authorize('update', $article);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'descr' => 'required',
        ]);

        if($validated) {
                $article->title = $request->title;
                $article->descr = $request->descr;
                $article->update();
                $article->update(['user_id' => Auth::guard('admin')->user()->id]);
            // dd($data);
            return redirect('admin/articles')->with('msg', 'Article Updated Successfully');
        }
    }
    public function destroy($id) {
        $article = Article::find($id);
        $this->authorize('delete', $article);
        $article->delete();
        return redirect('admin/articles')->with('msg', 'Article Deleted Successfully');

    }
}
