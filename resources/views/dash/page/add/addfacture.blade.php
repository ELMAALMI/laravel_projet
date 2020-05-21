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
                              Add Facture
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
      <form class="needs-validation" action="{{route('factures.store')}}" method="POST"  enctype="multipart/form-data" novalidate>
            @csrf
            <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i>New Facture</h6>
            @if ($type=="projet")
            <div class="form-row">
              <div class="col-md-6">
                <label for="Nom">Nom Projet</label>
                <input type="text" hidden value="{{$projet->projet_id}}" name="projet_id">
                <input type="text" class="form-control" id="Nom" value="{{$projet->nom_projet}}" disabled>
              </div>
              <div class="col-md-6">
                <label for="validationCustom02">Etat </label>
                <input type="text" class="form-control" id="validationCustom03" value="{{$projet->etat}}" disabled>
              </div>
            </div>
            @else
            <div class="form-row">
              <div class="col">
                <label for="Nom">Nom Projet</label>
                <input type="text" hidden value="{{$fourniture_id}}" name="service">
                <input type="text" class="form-control" id="Nom" value="{{$fournisseur->nom}}" disabled>
              </div>
            </div>
            @endif
            <div class="add-button">
              <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Payments detail</h6>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                  <label for="payment"> Type de tpayment </label>
                  <select class="custom-select" id="payment" name="type_payment" value="{{old("type_payment")}}" required>
                    <option selected value="versement">versement</option>
                    <option value="cheque">cheque</option>
                    <option value="espece">espece</option>
                  </select>
                <div class="invalid-feedback">
                  Etat et required
                </div>
              </div>
              <div class="col-md-6">
                <label for="montements">Montements</label>
                <input type="number" class="form-control" id="montements" name="montement"  value="{{old("montement")}}" placeholder="1787" required>
                <div class="invalid-feedback">
                  Montements et required
                </div>
                @error('montement')
                <span class="invalid-msg" role="alert">
                  <strong>{{ $message }}</strong>
                </span> 
              @enderror
              </div>
            </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="Avance">Avance</label>
              <input type="number" class="form-control" id="Avance" name="avance" value="{{old("avance")}}"  placeholder="1787" required>
              <div class="invalid-feedback">
                Avance et required
              </div>
          </div>
          <div class="col-md-6">
            <label for="Reste">Reste</label>
            <input type="number" class="form-control" id="Reste" name="reste" value="{{old("reste")}}"  disabled required>
            <div class="invalid-feedback">
               Service et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <label for="docs">Select all docs</label>
            <input type="file" class="form-control" id="docs" name="docs[]" multiple required>
            <div class="invalid-feedback">
              docs et required
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