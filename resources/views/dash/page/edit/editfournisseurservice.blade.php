@extends('layouts.dash')
@section('contents')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{url('/produit')}}"">Edit
                 Fournisseur Service
                </a>
              </li>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="add-button">
          <div class="nav-wrapper">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                          <i class="ni ni-building mr-2"></i>
                          Edit Fournisseur Service
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
   
      <form class="needs-validation" action="{{route('fournisseurservice.update',$service->service_id)}}" method="POST" novalidate>
            @csrf
            @method("PUT")
        <div class="add-button">
            <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Service</h6>
        </div>
        <div class="form-row">
            <div class="col">
            <label for="Service">Titre Service </label>
            <input type="text" class="form-control" id="Service"  name="service" value=" {{$service->nom}} " required>
            <div class="invalid-feedback">
                Service  et required
            </div>
            </div>
        </div>
        <div class="add-button">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
          </div>
        </div>
       </form>    
    </div>
  </div>
</div>

@endsection