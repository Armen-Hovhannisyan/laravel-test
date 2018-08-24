<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsArr = News::get();
        return view('news_list', with(['newsArr' => $newsArr]));
    }

    public function getNews(Request $request)
    {
        $news = News::find($request->id);
        return view('news', with(['news' => $news]));
    }

    public function addNews(\App\Http\Requests\NewsRequest $request)
    {
        $news = new News();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $news->image = $imageName;
        $news->description = $request->description;
        $news->info = $request->news;

        if ($news->save()) {
            $destinationPath = public_path('/news/images');
            $image->move($destinationPath, $imageName);

        }
        return redirect()->route('news');

    }

    public function deleteNews(Request $request)
    {
        $news = News::where('id',$request->id)->first();
        $filePath = public_path("/news/images/").$news->image;
        if(  unlink($filePath) &&  $news->delete() ){
            return response()->json([
                'success' => true,
                'message' => 'Text save successful',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Text not save'
        ]);

    }
}
