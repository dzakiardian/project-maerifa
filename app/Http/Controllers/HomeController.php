<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'pageTitle' => '',
            'active' => '',
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

    public function detailArticle()
    {
        return view('pages.detail-article', [
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
