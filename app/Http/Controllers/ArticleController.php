<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
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
}
