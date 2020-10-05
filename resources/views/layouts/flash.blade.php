@if (session('delete_message'))
<div class="alert alert-danger">
     {{ session('delete_message') }}
</div>
@endif

@if (session('success_message'))
<div class="alert alert-success">
     {{ session('success_message') }}
</div>
@endif
