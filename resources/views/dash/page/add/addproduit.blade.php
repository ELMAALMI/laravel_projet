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
              <li class="breadcrumb-item"><a href="{{url('/produit')}}"">Produit</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Produit
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
                          <i class="fa fa-user mr-2"></i>
                              Modifier Produit
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
      <form class="needs-validation" action="{{route('produit.store')}}" method="POST" novalidate>
            @csrf
            <div class="add-button">
                <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Produit</h6>
            </div>
          <div class="form-row">
            <div class="col">
              <label for="validationCustom01">Nom</label>
            <input type="text" class="form-control" id="validationCustom01"  name="nom" required>
              <div class="invalid-feedback">
                Nom et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="validationCustom01">date debut</label>
              <input type="text" class="form-control datepicker" id="validationCustom02"  name="date_debut"  required>
              <div class="invalid-feedback">
                date debut et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">date fin </label>
              <input type="text" class="form-control datepicker" id="validationCustom03"  name="date_fin" required>
              <div class="invalid-feedback">
                date fin et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="Adresse">Etat</label>
              <input class="form-control" type="text" id="Adresse"  name="etat" required>
              <div class="invalid-feedback">
                Etat et required
              </div>
            </div>
            <div class="col-md-6">
                <label for="Adresse">Montant alloué</label>
                <input class="form-control" type="text" id="Adresse" name="montant" required>
                <div class="invalid-feedback">
                    Montant et required
                </div>
            </div>
        </div>
        <div class="add-button">
        <div class="form-row">
          <div class="row">
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">Logo </span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" name="logo" required/>
                  </span>
               </div>
            </div>
            <div class="col">            
              <img width="46px" id="logo" src="{{ asset("img/image.png") }}" alt="your image" />
            </div>
          </div>
         </div>
        </div>
        <div class = "form-group">
          <label for = "name">description Produit</label>
          <textarea class = "form-control" rows = "6" name="description" id="summernote" required></textarea>
          <div class="invalid-feedback">
            description et required
          </div>
        </div>
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