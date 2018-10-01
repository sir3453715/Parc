<?php
namespace App\Http\Repositories\Frontend;

use App\article;
use App\indexKV;
use App\partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cookie;
use Session;


class IndexRepository{
    protected $indexKV;

    public function __construct(indexKV $indexKV, partner $partner){
        $this->indexKV = $indexKV;
        $this->partner = $partner;
    }

    public function getBannerResult($length = null, $order = false){
        $result = indexKV::where('active','1')->where('type','KV');
        $result = $result->orderBy('order', 'asc')->take($length)->get();
        return $result;
    }

    public function getQuoteResult($length = null, $order = false){
        $result = indexKV::where('active','1')->where('type','quote');
        $result = $result->orderBy('order', 'asc')->take($length)->get();
        return $result;
    }

    public function getPartnerResult(){
        $result = partner::where('active','1');
        $result = $result->orderBy('order', 'asc')->get();
        return $result;
    }

    public function getVideo(){
        $result = indexKV::where('type','video')->first();
        return $result;
    }
}