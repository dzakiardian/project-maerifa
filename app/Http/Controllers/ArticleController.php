<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function createArticle(ArticleRequest $request)
    {
        $request->validated();

        dd('bener cuyy');
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
