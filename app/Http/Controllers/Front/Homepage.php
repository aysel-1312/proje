<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//models
use App\Models\Blogs;
use App\Models\Category;




class Homepage extends Controller
{
    public function index(){
        $data['blogs']=Blogs::orderBy('created_at','DESC')->paginate(2);
        $data['blogs']->withPath(url('sayfa'));
        $data['categories']=Category::inRandomOrder()->get();
        return view('front.homepage',$data);
    }
    public function single($category,$slug)
    {
        //kategori yoksa hata sayfasına yönlendirecek
        //$category::whereSlug($category)->first() ?? abort(403,'Böyle bir yazı bulunamadı');
        //başlık yoksa hata sayfasına yönlendirecek
        $blogs=Blogs::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazı bulunamadı');

        //Tıklanma Sayısını veri tabanında gösterme.
        $blogs->increment('hit');
        $data['blogs']=$blogs;
        $data['categories']=Category::inRandomOrder()->get();
        return view('front.single',$data);

    }
    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazı bulunamadı');
        $data['category']=$category;
        $data['blog']=Blogs::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        $data['categories']=Category::inRandomOrder()->get();
        return view('front.category',$data);
    }


}
