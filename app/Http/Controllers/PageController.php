<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function about() {
        return view('pages.about');
    }

    public function social() {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('pages.social', compact('articles'));
    }

    public function contact() {
        return view('pages.contact');
    }


    public function news() {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('pages.news', compact('articles'));
    }
    public function showNewsDetail($id) {
    $article = Article::findOrFail($id);

    return view('pages.news-detail', compact('article'));

    }
}
