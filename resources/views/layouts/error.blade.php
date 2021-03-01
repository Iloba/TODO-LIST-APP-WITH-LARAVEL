@if (Session('status'))
<div class="alert alert-success">{{Session('status')}}</div>

@elseif(Session('error'))
<div class="alert alert-danger">{{Session('error')}}</div>

@endif