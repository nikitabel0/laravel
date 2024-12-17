<?php

namespace App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Events\NewArticleEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $articles = Cache::remember('articles'.$page, 3000, function(){
            return Article::latest()->paginate(6);
        });
        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $keys = DB::table('cache')->whereRaw('`key` GLOB :key', [':key'=>'articles*[0-9]'])->get();
        foreach($keys as $param){
            Cache::forget($param->key);
        }
        Gate::authorize('create', [self::class]);
        $request->validate([
            'date'=>'date',
            'name'=>'required|min:5|max:100',
            'desc'=>'required|min:5'
        ]);
        $article = new Article;
        $article->date = $request->date;
        $article->name = $request->name;
        $article->desc = $request->desc;
        $article->user_id = 1;
        if ($article->save()) {
            NewArticleEvent::dispatch($article);
            //return redirect('/article');
            return respons()->json(1);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if (isset($_GET['notify'])) auth()->user()->notifications->where('id', $_GET['notify'])->first()->markAsRead();
        $result = Cache::rememberForever('comment_article'.$article->id, function()use($article){
            $comments = Comment::where('article_id', $article->id)
                            ->where('accept', true)
                            ->get();
            $user = User::findOrFail($article->user_id);
            return [
                'comments'=>$comments,
                'user'=>$user
            ];
        });
        //return view('article.show', ['article'=>$article, 'user'=>$result['user'], 'comments'=>$result['comments']]);
        return respons()->json($resukt);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {

       // return view('article.update', ['article'=>$article]);
       return respons()->json($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $keys = DB::table('cache')->whereRaw('`key` GLOB :key', [':key'=>'articles*[0-9]'])->get();
        foreach($keys as $param){
            Cache::forget($param->key);
        }
        Gate::authorize('update', $article);
        $request->validate([
            'date'=>'date',
            'name'=>'required|min:5|max:100',
            'desc'=>'required|min:5'
        ]);
        $article->date = $request->date;
        $article->name = $request->name;
        $article->desc = $request->desc;
        $article->user_id = 1;
        if ($article->save()) return respons()->json(1);
        else return  respons()->json(0);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Cache::flush();
        Gate::authorize('delete', $article);
        if ($article->delete()) return respons()->json(1);
        else respons()->json($article);;
    }
}
