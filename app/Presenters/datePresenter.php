<?php
namespace App\Presenters;

class datePresenter{
    public function getChineseMonth($month){
        $chinese_month=array(
            "一月",
            "二月",
            "三月",
            "四月",
            "五月",
            "六月",
            "七月",
            "八月",
            "九月",
            "十月",
            "十一月",
            "十二月",
        );
        return $chinese_month[$month-1];
    }
}