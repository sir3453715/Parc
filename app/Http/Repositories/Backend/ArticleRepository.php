<?php
namespace App\Http\Repositories\Backend;

use App\article;
use App\category;
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
        $condition=$condition->where('category',$category);
        if($request->date_start){
            $condition=$condition->where('created_at','>',$request->date_start);
        }
        if($request->date_end){
            $condition=$condition->where('created_at','<',$request->date_end);
        }
        if($request->title){
            $condition=$condition->where('title',$request->title);
        }
        $condition=$condition->paginate(30);
        $datas=array(
            "category"  => DB::table('category')->get(),
            "article"   => $condition,
            "cookie"    => $request,
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
        $copy = null;
        if($article->pointer == "R"){
            $copy = article::where('pointer',$article->id)->first();
        }
        else if($article->pointer != "special" && $article->pointer != null){
            $copy = article::find($article->pointer);
        }
        $datas=array(
            "article"               => $article,
            "categories"            => DB::table('category')->get(),
            "sub_categories"        => DB::table('sub_category')->get(),
            "extra_sub_categories"  => DB::table('extra_sub_category')->get(),
            "lang"                  => DB::table('lang')->get(),
            "copy"                  => $copy,
        );
        return $datas;
    }
    public function update(Request $request, article $article){

        $article->active=               request('active') ? 1:0;
        $article->special=              request('special') ? 1:0;
        $article->order=                request('order') ? 0:1;
        $article->title=                request('title');
        $article->description=          request('description');
        $article->author=               request('author');
        $article->body=                 request('body');
        $article->category=             request('category');
        $article->sub_category=         request('sub_category');
        $article->extra_sub_category=   request('extra_sub_category') ?: 0;
        $article->lang=                 request('lang');
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
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $article->pic=$picName;
        }
        $article->save();

        //init copy
        $copy=null;

        if($article->pointer == "R"){
            $copy = article::where('pointer',$article->id)->first();
            //Copy the data
            $copy->active=          $article->active;             
            $copy->special=         $article->special;              
            $copy->order=           $article->order;
            $copy->title=           $article->title;             
            $copy->description=     $article->description;          
            $copy->author=          $article->author;
            $copy->body=            $article->body;
            $copy->lang=            $article->lang;
            $copy->display=         $article->display;
            $copy->user_id=         $article->user_id;
            $copy->expiry_date=     $article->expiry_date;
            $copy->video_url=       $article->video_url;

            //add own category
            $copy->category=$request->category2;
            $copy->sub_category=$request->sub_category2;
            $copy->extra_sub_category=$request->extra_sub_category2;
            $copy->pointer=$article->id;

            $copy->save();
            //detach copy tag
            $copy->tags()->detach();
            
        }
        else if($article->pointer != null){
            $copy = article::find($article->pointer);
            //Copy the data
            $copy->active=          $article->active;             
            $copy->special=         $article->special;              
            $copy->order=           $article->order;
            $copy->title=           $article->title;             
            $copy->description=     $article->description;          
            $copy->author=          $article->author;
            $copy->body=            $article->body;
            $copy->lang=            $article->lang;
            $copy->display=         $article->display;
            $copy->user_id=         $article->user_id;
            $copy->expiry_date=     $article->expiry_date;
            $copy->video_url=       $article->video_url;

            //add own category
            $copy->category=$request->category2;
            $copy->sub_category=$request->sub_category2;
            $copy->extra_sub_category=$request->extra_sub_category2;
            $copy->pointer= "R";

            $copy->save();
            //detach copy tag
            $copy->tags()->detach();
        }

        //detach all tag
        $article->tags()->detach();
        //save tag
        $tags= new \App\Tag;
        $tags_splitted=explode(',',$request->tags);
        foreach($tags_splitted as $tag_splitted){

            
            //if tag_splitted exist $exist_tag = new App\Tag::where('name','=',$tag_splitted);
            // dont save it to tag
            // reference it by $exist_tag=new blablabla
            // attach
            // else act normal
            $exist_tag_name = \App\Tag::where('name','=',$tag_splitted)->first();
            $exist_tag= $article->tags()->where('name',$tag_splitted)->exists();
            if(!$exist_tag){
                if($exist_tag_name!=null){
                    //attach tag
                    $article->tags()->attach($exist_tag_name);

                    if($copy!=null){
                        $copy->tags()->attach($exist_tag_name);    
                    }

                    //refresh tag
                    $tags= new \App\Tag;
                }
                else{
                    $tags->name=$tag_splitted;
                    $tags->save();
                    //attach tag
                    $article->tags()->attach($tags);

                    if($copy!=null){
                        $copy->tags()->attach($tags);    
                    }

                    //refresh tag
                    $tags= new \App\Tag;
                }
            }
        }
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
            'user_id'                   =>auth()->id(),
            'lock'                      =>request('lock') ? 1:0,
            'lang'                      =>request('lang'),
            'active'                    =>request('active') ? 1:0,
            'special'                   =>request('special') ? 1:0,
            'order'                     =>request('order') ? 0:1,
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
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $article->pic=$picName;
        }
        //init copy
        $copy=null;
        if($request->category2){
            $copy= $article->replicate();
            $copy->category=$request->category2;
            $copy->sub_category=$request->sub_category2;
            $copy->extra_sub_category=$request->extra_sub_category2;

            $copy->pointer=$article->id;
            $article->pointer="R";
            $copy->save();
        }
        $article->save();

        //save tag
        $tags= new \App\Tag;
        $tags_splitted=explode(',',$request->tags);
        foreach($tags_splitted as $tag_splitted){

            
            //if tag_splitted exist $exist_tag = new App\Tag::where('name','=',$tag_splitted);
            // dont save it to tag
            // reference it by $exist_tag=new blablabla
            // attatch
            // else act normal
            $exist_tag_name = \App\Tag::where('name','=',$tag_splitted)->first();
            $exist_tag= $article->tags()->where('name',$tag_splitted)->exists();
            if(!$exist_tag){
                if($exist_tag_name!=null){
                    //attach tag
                    $article->tags()->attach($exist_tag_name);
                    if($copy!=null){
                        $copy->tags()->attach($exist_tag_name);    
                    }

                    //refresh tag
                    $tags= new \App\Tag;
                }
                else{
                    $tags->name=$tag_splitted;
                    $tags->save();
                    //attach tag
                    $article->tags()->attach($tags);
                    if($copy!=null){
                        $copy->tags()->attach($tags);    
                    }

                    //refresh tag
                    $tags= new \App\Tag;
                }
            }
        }
    }
    public function destroy(article $article){
        if($article->pic){
            Storage::delete('public/'.$article->pic);
        }
        // pointer is either R or an id referencing another article
        if($article->pointer == "R"){
            $copy = article::where('pointer',$article->id)->first();
            $copy->tags()->detach();
            $copy->delete();
        }
        else if($article->pointer != null){
            $copy = article::find($article->pointer);
            $copy->tags()->detach();
            $copy->delete();
        }
        $article->delete();
        $article->tags()->detach();
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