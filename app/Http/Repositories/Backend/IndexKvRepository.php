<?php
namespace App\Http\Repositories\Backend;

use App\indexKV;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cookie;
use Session;


class IndexKvRepository{
    protected $indexKV;

    public function __construct(IndexKV $indexKV){
        $this->indexKV=$indexKV;
    }
    public function video(){
        return indexKV::where('type','video')->first();
    }
    public function videoUpdate(Request $request){
        $result = indexKV::where('type','video')->first();
        if($result != null){
            $url = $request->link;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube );
            $result->link = $youtube['v'];

            $result->title = $request->title;
            $result->type = "video";
            $result->lang = 0 ;
            $result->save();
        }
        else{
            $result = new indexKV;

            $url = $request->link;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube );
            $result->link = $youtube['v'];

            $result->title = $request->title;
            $result->type = "video";
            $result->lang = 0 ;
            $result->save();
        }
    }
    public function kvIndex(Request $request){
        return indexKV::where('type','KV')->orderBy('order','asc')->get();
    }
    public function quoteIndex(Request $request){
        return indexKV::where('type','quote')->orderBy('order','asc')->get();
    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function edit(indexKV $indexKV){
        $datas=array(
            "indexKV"               => $indexKV,
            "lang"                  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function update(Request $request, indexKV $indexKV){

        $indexKV->active=   request('active')? 1:0;
        $indexKV->title=    request('title');
        $indexKV->author=   request('author');
        $indexKV->body=     request('body');
        $indexKV->link=     request('link');
        $indexKV->lang=     request('lang');
        $indexKV->order=    request('order');

        //save pic path
        if($request->pic){
            Storage::delete('public/'.$indexKV->pic);
            $indexKV->pic = Storage::disk('public')->putFile('indexKV', $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/indexKV', $picName);
            // $indexKV->pic='indexKV/'.$picName;
            $indexKV->save();
        }
        else{
            $indexKV->save();
        }
    }
    public function store(Request $request){
        $indexKV=indexKV::create([
            'active'    =>request('active') ? 1:0,
            'type'      =>request('type'),
            'title'     =>request('title'),
            'author'    =>request('author'),
            'body'      =>request('body'),
            'link'      =>request('link'),
            'lang'      =>request('lang'),
            'order'     =>request('order')
        ]);
        //save pic path
        if($request->pic){
            $indexKV->pic = Storage::disk('public')->putFile('indexKV', $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/indexKV', $picName);
            // $indexKV->pic='indexKV/'.$picName;
        }
        $indexKV->save();
    }

    public function destroy(indexKV $indexKV){
        if($indexKV->pic){
            Storage::delete('public/'.$indexKV->pic);
        }
        $indexKV->delete();
    }

}