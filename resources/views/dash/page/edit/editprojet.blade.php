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
              <li class="breadcrumb-item"><a href="{{url('/produit')}}"">Projet detail</a></li>
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
                          Projet Detail
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
        <form class="needs-validation" action=" {{route("projet.update",$projet->projet_id)}} " method="POST" enctype="multipart/form-data" novalidate>
          @method("PUT")
          @csrf 
            <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Projet detail</h6>
              <div class="form-row">
                <div class="col">
                  <label for="nomprojet">Nom de projet</label>
                  <input type="text" class="form-control @error('nom_projet') is-invalid-msg @enderror" id="nomprojet" placeholder="moonair" name="nom_projet" value="{{$projet->nom_projet}}"  required>
                  <div class="invalid-feedback">
                    Nom et required
                  </div>
                  @error('nom_projet')
                  <span class="invalid-msg" role="alert">
                    <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="date_demande">date demande </label>
                  <input class="form-control datepicker @error('date_demande') is-invalid-msg @enderror" id="date_demande" name="date_demande" placeholder="Select date" value="{{$projet->date_demande}}" type="text" required>
                  <div class="invalid-feedback">
                    date et required
                  </div>
                  @error('date_demande')
                  <span class="invalid-msg" role="alert">
                    <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="date_livraison">date livraison </label>
                  <input class="form-control datepicker @error('date_livraison') is-invalid-msg @enderror" placeholder="Select date" id="date_livraison" name="date_livraison" value="{{$projet->date_livraison}}" type="text" required>
                  <div class="invalid-feedback">
                    date et required
                  </div>
                  @error('date_livraison')
                  <span class="invalid-msg" role="alert">
                    <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <label for="summernote">description</label>
                  <textarea id="summernote" name="description" required>{{html_entity_decode($projet->description)}}</textarea>        
                </div>
                <div class="invalid-feedback">
                  description et required
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="etat"> Etat </label>
                  <select class="custom-select" id="Service" name="etat" required>
                    <option @if($projet->etat=="conseption") selected @endif value="conseption">conseption</option>
                    <option @if($projet->etat=="production") selected @endif value="production">production</option>
                    <option @if($projet->etat=="commercialisation") selected @endif value="commercialisation">commercialisation</option>
                  </select>
                  <div class="invalid-feedback">
                    Etat et required
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="Service">Service</label>
                  <select class="custom-select" id="Service" name="service" value="{{$projet->service}}" required>
                    @foreach ($services as $service)
                        <option @if($projet->service_id == $service->service_id) selected @endif
                           value=" {{$service->service_id}} "> {{$service->nom}} </option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Service et required
                  </div>
                </div>
          </div>
          <hr>
          <div class="add-button">
            <div class="col">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
          </div>
      </form> 
   </div>
  </div>
</div>
@endsection