@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- 內容區塊-->
        <table border="0" cellpadding="0" cellspacing="0" style="margin:30px">
            <tr>
                <td>
                    <p style="color: Gray">
                        Login Time:  
                        <span id="ctl00_ContentPlaceHolder1_loginDateTime" style="font-size:Small;">
                            <?php
                            date_default_timezone_set('Asia/Taipei');
                            echo date("Y/m/d h:i:s");
                            ?>
                        </span>
                        <br />
                        Role:
                        <span id="ctl00_ContentPlaceHolder1_loginName" style="font-size:Small;">
                            {{ $username }}
                        </span>
                    </p>
                    <p style="color: Gray">
                        Welcome to  <span id="ctl00_ContentPlaceHolder1_labSystemName"><?php echo env('APP_NAME')?></span><br />
                        Use the left menu bar to control.<br /><br />
                        Production date: <?php echo env('RELEASE_DATE')?>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
