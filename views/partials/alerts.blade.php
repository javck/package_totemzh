@if(session()->has('success'))
    <uikit-alert type="success">
        {{session()->get('success')}}
    </uikit-alert>
@endif
@if($errors->any())
    <uikit-alert type="danger">
        請更正錯誤之後嘗試重新提交.
    </uikit-alert>
@endif