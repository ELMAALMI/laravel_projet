@if(session()->has('statut'))
<div class="alert alert-danger" role="alert">
<strong></strong>
{{ session()->get('statut')}}
</div>
@endif