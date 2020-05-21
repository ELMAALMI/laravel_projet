@if(session()->has('statut'))
<div class="alert alert-success" role="alert">
<strong></strong>
{{ session()->get('statut')}}
</div>
@endif