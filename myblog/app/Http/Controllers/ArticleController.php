<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    function index() {
        $data = DB::table('articles')->paginate(9);
        return view('articles', ['data' => $data]);
    }
    
    public function create()
    {
        return view('create');
    }

   /* public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'slug' => 'required|max:255|unique:data',
            'content' => 'required',
        ]);
        $data = data::create($validatedData);
        return redirect()->route('show', $data->id);
    }*/

    public function show($data)
    {
        $data=Article::find($data);
        return view('show', compact('data'));
    }

    public function edit($data)
    {
        $data=Article::find($data);
        return view('edit', compact('data'));
    }

   /* public function update(Request $request, articles $data)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'slug' => 'required|max:255|unique:data,slug,' . $data->id,
            'content' => 'required',
        ]);
        $data->update($validatedData);
        return redirect()->route('article.show', $data->id);
    }*/
    public function update(Request $request, $id)
{
    $article = Article::find($id);
    $article->title = $request->input('title');
    $article->content = $request->input('content');
    $article->save();
    return redirect('/show/'.$id)->with('success', 'Article mis à jour avec succès');
}

    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->route('article.index');
    }
    public function store(Request $request)
{
  $request->validate([
    'title' => 'required',
    'subtitle' => 'required',
    'slug' => 'required',
    'content' => 'required',
  ]);

  $data = new Article;
  $data->title = $request->input('title');
  $data->subtitle = $request->input('subtitle');
  $data->slug = $request->input('slug');
  $data->content = $request->input('content');
  $data->save();

  return redirect()->route('article.show', $data->id);
}



}
