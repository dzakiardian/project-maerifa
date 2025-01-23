<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Article::with(['user'])->paginate(12);

        return view('pages.home', [
            'pageTitle' => '',
            'active' => '',
            'articles' => $articles,
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'pageTitle' => 'About',
            'active' => 'about',
        ]);
    }

    public function article(): View
    {
        return view('pages.article', [
            'pageTitle' => 'Article',
            'active' => 'article',
        ]);
    }

    public function detailArticle(string $slug)
    {
        $article =  Article::with(['user'])->where('slug', '=', $slug)->first();

        return view('pages.detail-article', [
            'pageTitle' => 'Detail Article',
            'active' => 'detail-article',
            'article' => $article,
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
