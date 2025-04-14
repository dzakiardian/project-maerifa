<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $firstArticle = Article::with(['user'])->where('slug', 'belajar-cara-membuat-artikel-di-maerifa')->first();
        $articles = Article::inRandomOrder()->with(['user'])->paginate(12);

        return view('pages.home', [
            'pageTitle' => '',
            'active' => '',
            'articles' => $articles,
            'firstArticle' => $firstArticle,
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'pageTitle' => 'About',
            'active' => 'about',
        ]);
    }

    public function article(Request $request): View | JsonResponse
    {
        if($request->query('q')) {
            $keySearch = $request->query('q');
            $articles = Article::inRandomOrder()
            ->with(['user'])
            ->where('title', 'like', "%{$keySearch}%")
            ->orWhere('slug', 'like', "%{$keySearch}%")
            ->orWhereHas('user', function($query) use ($request) {
                $keySearch = $request->query('q');
                $query->where('username', 'like', "%{$keySearch}%");
            })
            ->orWhere('categories', 'like', "%{$keySearch}%")
            ->paginate(12);

            return response()->json(['articles' => $articles]);

        } else {
            $articles = Article::inRandomOrder()->with(['user'])->paginate(12);
        }

        $firstArticle = Article::with(['user'])->where('slug', 'belajar-cara-membuat-artikel-di-maerifa')->first();

        return view('pages.article', [
            'pageTitle' => 'Article',
            'active' => 'article',
            'articles' => $articles,
            'firstArticle' => $firstArticle,
        ]);
    }

    public function detailArticle(string $slug)
    {
        $randomArticles = Article::inRandomOrder()->limit(10)->get();
        $article =  Article::with(['user'])->where('slug', '=', $slug)->first();

        return view('pages.detail-article', [
            'pageTitle' => 'Detail Article',
            'active' => 'detail-article',
            'article' => $article,
            'randomArticles' => $randomArticles,
        ]);
    }

    public function newArticle(): View
    {
        return view('pages.new-detail-article', [
            'pageTitle' => 'Detail Article',
            'active' => 'detail-article',
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'pageTitle' => 'Contact',
            'active' => 'contact',
        ]);
    }
}
