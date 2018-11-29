<?php
namespace App\Http\Repositories\Backend;

use App\article;
use App\category;
use App\sub_category;
use App\extra_sub_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cookie;
use Session;


class ArticleRepository{
    protected $article;

    public function __construct(Article $article){
        $this->article=$article;
    }
    public function index(Request $request){
        $condition=article::select('*');
        switch($request->segment(3)){
            case "story":
                $category=1;
                break;
            case "event":
                $category=2;
                break;
            case "law":
                $category=3;
                break;
            case "trend":
                $category=4;
                break;
            case "news":
                $category=5;
                break;
        }
        $sub_category = DB::table('sub_category')->where('category_id',$category)->get();
        // $condition=$condition->where('active', 1);
        $condition=$condition->where('category',$category);
        if($request->date_start){
            $condition=$condition->where('created_at','>=',$request->date_start);
        }
        if($request->display != null){
            $condition=$condition->where('display',$request->display);
        }
        if($request->date_end){
            $condition=$condition->where('created_at','<=',$request->date_end);
        }
        if($request->title){
            $condition=$condition->where('title','like','%'.$request->title.'%');
        }
        if($request->sub_category != null){
            $condition=$condition->where('sub_category',$request->sub_category);
        }
        $condition=$condition->orderBy('updated_at','desc');
        $condition=$condition->paginate(10);
        $datas=array(
            "category"      => DB::table('category')->get(),
            "article"       => $condition,
            "cookie"        => $request,
            "sub_category"  => $sub_category,
        );
        return $datas;
    }
    public function special(Request $request){
        $condition=article::select('*')->where('special','1')->where('category','1')->orderBy('order','asc')->get();
        $datas=array(
            "article"   => $condition,
        );
        return $datas;
    }
    public function create(){
        $datas=array(
            "categories"                => DB::table('category')->get(),
            "sub_categories"            => DB::table('sub_category')->get(),
            "extra_sub_categories"      => DB::table('extra_sub_category')->get(),
            "lang"                      => DB::table('lang')->get()
        );
        return $datas;
    }
    public function edit(article $article){
        $datas=array(
            "article"               => $article,
            "categories"            => DB::table('category')->get(),
            "sub_categories"        => DB::table('sub_category')->get(),
            "extra_sub_categories"  => DB::table('extra_sub_category')->get(),
            "lang"                  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function update(Request $request, article $article){

        $article->active=               request('active') ? 1:0;
        $article->special=              request('special') ? 1:0;
        // $article->order=                request('order') ? 0:1;
        $article->title=                request('title');
        $article->description=          request('description');
        $article->author=               request('author');
        $article->body=                 request('body');
        $article->category=             request('category');
        $article->sub_category=         request('sub_category');
        $article->extra_sub_category=   request('extra_sub_category') ?: 0;
        $article->tags=                 request('tags');
        $article->lang=                 request('lang');
        $article->lock=                 request('lock') ? 1:0;
        $article->display=              request('display')? 1:0;
        $article->user_id=              auth()->id();
        $article->expiry_date=          request('expiry_date');
        // $article->video_url=            request('video_url');

        // get youtube video id
        if($request->video_url){
            $url = $request->video_url;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube );
            $article->video_url = $youtube['v'];
        }
        //save pic path
        if($request->pic){
            if($article->pic){
                Storage::delete('public/'.$article->pic);
            }
            $article->pic = Storage::disk('public')->putFile('article/'.$article->category_en(), $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/article/'.$article->category_en(), $picName);
            // $article->pic='article/'.$article->category_en().'/'.$picName;
        }
        $article->save();
    }
    public function store(Request $request){
        $article=article::create([
            'title'                     =>request('title'),
            'description'               =>request('description'),
            'author'                    =>request('author'),
            'body'                      =>request('body'),
            'category'                  =>request('category'),
            'sub_category'              =>request('sub_category'),
            'extra_sub_category'        =>request('extra_sub_category') ?: 0,
            'tags'                      =>request('tags'),
            'user_id'                   =>auth()->id(),
            'lock'                      =>request('lock') ? 1:0,
            'lang'                      =>request('lang'),
            'active'                    =>request('active') ? 1:0,
            'special'                   =>request('special') ? 1:0,
            'order'                     =>0,
            'display'                   =>request('display') ? 1:0,
            'expiry_date'               =>request('expiry_date'),
            // 'video_url'                 =>request('video_url'),
        ]);
        //get youtube video id
        if($request->video_url){
            $url = $request->video_url;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube );
            $article->video_url = $youtube['v'];
        }
        //save pic path
        if($request->pic){
            $article->pic = Storage::disk('public')->putFile('article/'.$article->category_en(), $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/article/'.$article->category_en(), $picName);
            // $article->pic='article/'.$article->category_en().'/'.$picName;
        }
        $article->save();
    }
    public function orderUpdate(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = article::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
    public function copy_list(Request $request){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $request->category_select = ($request->cookie('category_select')) ? $request->cookie('category_select') : $request->category_select;
            $request->sub_category = ($request->cookie('sub_category')) ? $request->cookie('sub_category') : $request->sub_category;
            $request->extra_sub_category = ($request->cookie('extra_sub_category')) ? $request->cookie('extra_sub_category') : $request->extra_sub_category;
        }
        if($request->category_select)
        {
            $condition=article::select('*');
            if($request->category_select){
                $condition=$condition->where('category',$request->category_select);
                $request->category_select_name = category::find($request->category_select)->name;
                // $request->session()->put('category_name',category::find($request->category_select)->value('name'));
            }
            if($request->sub_category){
                $condition=$condition->where('sub_category',$request->sub_category);
                $request->sub_category_name = sub_category::find($request->sub_category)->name;

            }
            if($request->extra_sub_category){
                $condition=$condition->where('extra_sub_category',$request->extra_sub_category);
                $request->extra_sub_category_name = extra_sub_category::find($request->extra_sub_category)->name;

            }
        }
        else{
            $condition=article::select('*')->where('category',1);
        }
        $condition=$condition->paginate(10);
        Cookie::queue('category_select', $request->category_select, 60);
        Cookie::queue('sub_category', $request->sub_category, 60);
        Cookie::queue('extra_sub_category', $request->extra_sub_category, 60);
        $datas=array(
            "categories"                => DB::table('category')->get(),
            "sub_categories"            => DB::table('sub_category')->get(),
            "extra_sub_categories"      => DB::table('extra_sub_category')->get(),
            "lang"                      => DB::table('lang')->get(),
            "article"                   => $condition,
            "request"                   => $request,
        );
        return $datas;
    }
    public function copy_selected(Request $request){
        $count=0;
        if($request->article_copy_id){
            foreach($request->article_copy_id as $data){
                $article= article::find($data);
                $this->copy($request,$article);
                $count++;
            }
        }
        return $count;
    }
    public function copy(Request $request,article $article){
            $copy= $article->replicate();
            $copy->category=$request->category_copy;
            $copy->sub_category=$request->sub_category_copy;
            $copy->extra_sub_category=0;
            $path = str_replace($article->category_en(),"news",$article->pic);
            //if file exist,  rename and copy
            if((Storage::disk('public')->exists($path))){
                //rename and copy
                $path = substr_replace($path, time().'.', 14, 0);
                // dd($path);
                Storage::copy('public/'.$article->pic, 'public/'.$path);
            }
            else{
                Storage::copy('public/'.$article->pic, 'public/'.$path);    
            }
            $copy->pic = $path;
            $copy->save();
    }
    public function destroy(article $article){
        if($article->pic){
            Storage::delete('public/'.$article->pic);
        }
        $article->delete();
    }
    public function delete_selected(Request $request){
        $count=0;
        if($request->article_delete_id){
            foreach($request->article_delete_id as $data){
                $article= article::find($data);
                $this->destroy($article);
                $count++;
            }
        }
        return $count;
    }
    public function sub_menu_ajax($category_id)
    {
        $sub_category = DB::table('sub_category')
                    ->where('category_id',$category_id)
                    ->pluck('name','id');
        return json_encode($sub_category);
    }

    public function extra_sub_menu_ajax($category_id,$sub_category_id)
    {
        $extra_sub_category = DB::table('extra_sub_category')
                    ->where('sub_category_id',$sub_category_id)
                    ->pluck('name','id');
        return json_encode($extra_sub_category);
    }
}