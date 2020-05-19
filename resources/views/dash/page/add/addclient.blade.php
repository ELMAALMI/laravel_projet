@extends('layouts.dash')
@section('contents')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href=" {{url("/home")}} "><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Client</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Add new Client
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
                            New Client
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
     @endif
    <div class="card-body">
      <div class="tab-content">       
        <form class="needs-validation" action=" {{route("clients.store")}} " method="POST"  enctype="multipart/form-data" novalidate>
          @csrf
          <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Coordonnées personelles</h6>
          <div class="form-row">
            <div class="col">
              <label for="CIN">CIN</label>
              <input type="text" class="form-control @error('cin') is-invalid-msg @enderror " maxlength="10" minlength="6" id="CIN" placeholder="D877 899" name="cin" value="{{old("cin")}}"  required>
              <div class="invalid-feedback">
                CIN et required & min < 6
              </div>
              @error('cin')
                <span class="invalid-msg" role="alert">
                  <strong>{{ $message }}</strong>
                </span> 
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="validationCustom01">Nom</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="nom" name="nom" value="{{old("nom")}}" required>
              <div class="invalid-feedback">
                Nom et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Prenom </label>
              <input type="text" class="form-control" id="validationCustom03" placeholder="prenom" name="prenom" value="{{old("prenom")}}"  required>
              <div class="invalid-feedback">
                prenom et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="validationCustom01">date-naissance</label>
              <input class="form-control datepicker @error('date_naissance')is-invalid-msg @enderror " placeholder="Select date" type="text" name="date_naissance" value="{{old("date_naissance")}}" required>
              <div class="invalid-feedback">
                date de naissance et required
              </div>
              @error('date_naissance')
              <span class="invalid-msg" role="alert">
                <strong>{{ $message }}</strong>
              </span> 
              @enderror
            </div>
            <div class="col-md-6">
              <div class="form-row">
                <div class="add-button">
                  <div class="form-row">
                    <div class="row">
                      <div class="col">
                        <span>Sexe</span>
                      </div>
                      <div class="w-100"></div>
                      <div class="col"> 
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="m" name="sexe" class="custom-control-input" value="M"
                                @if (old("sexe") == "M")
                                    checked
                                @endif required>
                                <label class="custom-control-label" for="m">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="f" name="sexe" class="custom-control-input" value="F"
                          @if (old("sexe") == "F")
                          checked
                         @endif required>
                          <label class="custom-control-label" for="f">F</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
          <div class="form-row">
            <div class="col-md-6">
              <label for="mail">Mail</label>
              <input type="text" class="form-control  @error('mail')is-invalid-msg @enderror" id="mail" placeholder="feen@feentech.com" name="email" value="{{old("email")}}"  required>
              <div class="invalid-feedback">
                Mail et required
              </div>
              @error('mail')
              <span class="invalid-msg" role="alert">
                <strong>{{ $message }}</strong>
              </span> 
             @enderror
            </div>
            <div class="col-md-6">
              <label for="tele">Tele</label>
              <input type="number" class="form-control @error('tele')is-invalid-msg @enderror" id="tele" maxlength="14" placeholder="062114545" name="tele" value="{{old("tele")}}"required>
              <div class="invalid-feedback">
                Tele et required
              </div>
              @error('tele')
              <span class="invalid-msg" role="alert">
                <strong>{{ $message }}</strong>
              </span> 
             @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="col mb-3">
              <label for="adresse">Adresse</label>
              <input type="text" class="form-control" id="adresse" placeholder="29 Marjane" name="adresse" value="{{old("adresse")}}" required>
              <div class="invalid-feedback">
                l'adresse et required
              </div>
            </div>
          </div>
          <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Projet detail</h6>
          <div class="form-row">
            <div class="col">
              <label for="nomprojet">Nom de projet</label>
              <input type="text" class="form-control @error('nom_projet') is-invalid-msg @enderror" id="nomprojet" placeholder="moonair" name="nom_projet" value="{{old("nom_projet")}}"  required>
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
              <label for="date_livraison">date livraison </label>
              <input class="form-control datepicker @error('date_livraison') is-invalid-msg @enderror" placeholder="Select date" id="date_livraison" name="date_livraison" value="{{old("date_livraison")}}" type="text" required>
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
              <textarea id="summernote" name="description" required>{{old("description")}}</textarea>        
            </div>
            <div class="invalid-feedback">
              description et required
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="etat"> Etat </label>
              <select class="custom-select" id="Service" name="etat" value="{{old("etat")}}" required>
                <option selected value="conseption">conseption</option>
                <option value="production">production</option>
                <option value="commercialisation">commercialisation</option>
              </select>
              <div class="invalid-feedback">
                Etat et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="Service">Service</label>
              <select class="custom-select" id="Service" name="service" value="{{old("service")}}" required>
                @foreach ($services as $service)
                    <option value=" {{$service->service_id}} "> {{$service->nom}} </option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Service et required
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
          <input type="number" class="form-control" id="montements" name="montement" value="{{old("montement")}}" placeholder="1787" required>
          <div class="invalid-feedback">
            Montements et required
          </div>
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
          <input type="number" class="form-control" id="Reste" name="reste" value="{{old("reste")}}"  value="0" disabled required>
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