@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- 內容區塊-->
        <table border="0" cellpadding="0" cellspacing="0" style="margin:30px">
            <tr>
                <td>
                    <p style="color: Gray">
                        歡迎來到  <span id="ctl00_ContentPlaceHolder1_labSystemName">病人自主後臺管理系統</span><br />
                        請使用左方導航列使用系統<br /><br />
                    </p>
                    <p style="color: Gray">
                            登入時間:  
                            <span id="ctl00_ContentPlaceHolder1_loginDateTime" style="font-size:Small;">
                                    <?php
                            date_default_timezone_set('Asia/Taipei');
                            echo date("Y/m/d h:i:s");
                            ?>
                        </span>
                        <br />
                        使用者:
                        <span id="ctl00_ContentPlaceHolder1_loginName" style="font-size:Small;">
                                {{ $username }}
                            </span>
                        </p>
                        系統最後更新時間: {{ env('RELEASE_DATE','2018/10/01') }}
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
