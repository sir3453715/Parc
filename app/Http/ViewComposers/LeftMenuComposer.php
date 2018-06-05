<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\FunMenu;
use Auth;

class LeftMenuComposer {

    protected $user_id;
    protected $user_name;

    public function __construct()
    {
        if (Auth::check()) {
            // 這個使用者已經登入...
            $user = Auth::user();

            $this->user_id = $user->id;
            $this->user_name = $user->name;
        } else {
            $this->user_id = 0;
            $this->user_name = "Guest";
        }
    }

    public function compose(View $view)
    {
        $funmenu = new FunMenu;
        $result = $funmenu->leftmenu($this->user_id);
        $view->with(['leftmenu' => $result, 'username' => $this->user_name]);
    }
}