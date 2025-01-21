<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function createArticle(ArticleRequest $request)
    {
        $rules = $request->validated();

        if($request->hasFile('thumbnail')) {
            $fileName = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('thumbnails', $fileName, 'public');
            $rules['thumbnail'] = $fileName;
        }

        $rules['user_id'] = Auth::user()->id;
        Article::create($rules);

        return redirect('/dashboard/articles')->with('success-message', 'Artikel berhasil dibuat!');
    }

    public function uploadFileArticle(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '-' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image upload successfully';

            $response = "<script>
                window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')
            </script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function editArticle(Request $request, string $slug): RedirectResponse
    {
        $rules = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'slug' => ['required', 'min:3', 'unique:articles,slug'],
            'categories' => ['required'],
            'thumbnail' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'content' => ['required'],
        ]);

        $article = Article::where('slug', '=', $slug)->first();

        if(!$article) {
            return redirect('/dashboard/articles')->with("error-message", "Article not found");
        }

        if($request->hasFile('thumbnail')) {
            if($article->thumbnail) {
                Storage::disk('public')->delete('thumbnails/' . $article->thumbnail);
            }
            $fileName = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('thumbnails', $fileName, 'public');
            $rules['thumbnail'] = $fileName;
        }

        $article->update($rules);

        return redirect("/dashboard/articles")->with("success-message", "Article success updated!");
    }

    public function deleteArticle(string $slug): RedirectResponse
    {
        $article = Article::where("slug", "=", $slug)->first();
        if(!$article || $article->user_id != Auth::user()->id) {
            return redirect('/dashboard/articles')->with('error-message', 'Forbidden');
        }

        Storage::disk('public')->delete('thumbnails/' . $article->thumbnail);
        $article->destroy($article->id);

        return redirect('/dashboard/articles')->with('success-message', 'Article success deleted!');
    }
}
