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
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Fournisseur</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add new Fournisseur</li>
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
        <div class="add-button">
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                  <i class="fa fa-user mr-2"></i> Nouveaux Fournisseur
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body">
            <div class="tab-content">
              <form class="needs-validation" action= "{{route('fournisseur.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <input type="text" hidden value="true" name="fournisseur">
                <div class="add-button">
                  <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Fournisseur</h6>
                </div>
                <div class="form-row">
                  <div class="col">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" placeholder="Maroctelecom" name="nom" required>
                    <div class="invalid-feedback">
                      Nom et required
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="Tele">Tele</label>
                    <input type="number" class="form-control" id="Tele" placeholder="06787879879" name="tele" required>
                    <div class="invalid-feedback">
                        Tele et required
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="validationCustom02">Email </label>
                      <input type="email" class="form-control" id="Email" placeholder="Email" name="email"  required>
                      <div class="invalid-feedback">
                        Email et required
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="Adresse">Adresse</label>
                      <input class="form-control" type="text" id="Adresse" placeholder="29 Marjane" name="adresse" required>
                      <div class="invalid-feedback">
                        Adresse et required
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="Service">Type de Service</label>
                      <input class="form-control" type="text" id="Service" placeholder="FINANCE" name="service" required>
                      <div class="invalid-feedback">
                        Type de Service
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
                          <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
                        </div>
                      </div>
                    </div>
                  </div>
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
                    <div class="col-md-6">
                      <label for="Avance">Avance</label>
                      <input class="form-control datepicker @error('date_demande') is-invalid-msg @enderror" id="date_demande" name="date_demande" placeholder="Select date" value="{{old("date_demande")}}" type="text" required>
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
                      <label for="Reste">Reste</label>
                      <input class="form-control datepicker @error('date_demande') is-invalid-msg @enderror" id="date_demande" name="date_demande" placeholder="Select date" value="{{old("date_demande")}}" type="text" required>
                      <div class="invalid-feedback">
                        date et required
                      </div>
                      @error('date_demande')
                        <span class="invalid-msg" role="alert">
                          <strong>{{ $message }}</strong>
                        </span> 
                      @enderror
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
      </div>
    </div>
  </div>
</div>

@endsection