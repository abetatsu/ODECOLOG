@if (session('flash_message'))
<div class="alert alert-danger">
     {{ session('flash_message') }}
</div>
@endif