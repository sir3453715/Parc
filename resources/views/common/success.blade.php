@if (session('success'))
    <!-- 成功清單 -->
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!!</strong>
        <br />
        <ul>
            <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif
