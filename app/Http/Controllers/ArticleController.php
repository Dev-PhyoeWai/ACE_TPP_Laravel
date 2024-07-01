<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->middleware('auth');
        $this->articleRepository = $articleRepository;
    }
    public function index()
    {
        $article = $this->articleRepository->getAll();
        return view('articles.index', compact('article'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        //        Article::create([
        //        ]);
        $this->articleRepository->create([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
        ]);
        return redirect()->route('articles.index');
    }

    public function edit($id){
        // $data = Article::where('id', $id)->first();
        $data = $this->articleRepository->getId($id);
        return view('articles.edit', compact('data'));
    }

    public function update(Request $request,$id){
        //  $data = Article::findOrFail($id);
        //  $data->update([
        //  ]);
        $this->articleRepository->update([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
        ], $id);
        return redirect()->route('articles.index')->with('success', 'Post updated successfully.');
    }
    public function destroy($id)
    {
        // $article->delete();
        $this->articleRepository->delete($id);
        return redirect()->route('articles.index')->with('success', 'Post deleted successfully.');
    }
}
