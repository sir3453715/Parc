<?php
namespace App\Http\Repositories\Frontend;

use App\indexKV;
use App\partner;

class IndexRepository
{
    protected $indexKV;

    public function __construct(indexKV $indexKV)
    {
        $this->indexKV = $indexKV;
    }

    public function getBannerResult($length)
    {
        $result = indexKV::where('active', '1')->where('type', 'kv');
        $result = $result->orderBy('order', 'asc')->take($length)->get();
        return $result;
    }

    public function getVideo()
    {
        $result = indexKV::where('type', 'video')->first();
        return $result;
    }

    public function getPartnerResult()
    {
        $result = partner::where('active', '1');
        $result = $result->orderBy('order', 'asc')->get();
        return $result;
    }
}