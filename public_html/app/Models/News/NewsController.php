<?php

namespace App\Models\News;

use App\Models\News\News;
use App\Models\News\NewsCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    
    protected $model;
    
    public function __construct()
    {
      $this->model = new News;
    }
    
    public function index($newsCategory = '', $categories = [])
    {
      $news = '';
      $featuredNews = News::where('web_visible', 1)->orderBy('id', 'desc');
      if ($newsCategory) $featuredNews = $featuredNews->whereIn('category_id', $categories);
      $featuredNews = $featuredNews->orderBy('id', 'desc')->first();
      if ($featuredNews && $featuredNews->count()) {
        $news = News::where('web_visible', 1)->orderBy('id', 'desc');
        if ($newsCategory) $news = $news->whereIn('category_id', $categories);
        $news = $news->where('id', '!=', $featuredNews->id)->paginate();
      }
      
      return view('news-and-information')->with([
        'news' => $news,
        'featuredNews' => $featuredNews,
        'newsCategory' => $newsCategory,
      ]);
      
      // $currentPage = (request()->get('page')) ? request()->get('page') : 1;
      // $featuredNews = News::visible()->first();
      // $news = News::visible()->where('id', '!=', $featuredNews->id)->paginate();
      //
      // return view('news-and-information')->with([
      //   'news' => $news,
      //   'featuredNews' => $featuredNews,
      // ]);
    }
    
    public function show($id = '', $slug = '')
    {
      if (!$id) return abort(404);
      
      $news = $this->model->find($id);
      if (!$news) return abort(404);
      
      return view('news-details', compact('news'));
    }
    
    public function byCategory($slug)
    {
      if (!$slug) return abort(404);
      
      $category = NewsCategory::where('web_visible', 1)->where('slug', $slug)->first();
      if (!$category) return abort(404);
      
      $categories = [
        $category->id,
      ];
      if ($category->children) {
        foreach ($category->children as $key => $value) {
          $categories[] = $value->id;
          if ($value->children) {
            foreach ($value->children as $_key => $_value) {
              $categories[] = $_value->id;
            }
          }
        }
      }
      
      return $this->index($category, $categories);
      
      // if (!$slug) return abort(404);
      //
      // $category = NewsCategory::visible()->where('slug', $slug)->first();
      // if (!$category) return abort(404);
      //
      // $featuredNews = News::visible()->where('category_id', $category->id)->first();
      // $news = News::visible()->where('category_id', $category->id);
      //
      // if ($featuredNews) {
      //   $news = $news->where('id', '!=', $featuredNews->id);
      // }
      //
      // $news = $news->paginate();
      //
      // return view('news-and-information')->with([
      //   'news' => $news,
      //   'featuredNews' => $featuredNews,
      //   'newsCategory' => $category,
      // ]);
    }
}
