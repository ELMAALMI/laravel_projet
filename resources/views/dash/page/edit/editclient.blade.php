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
              <li class="breadcrumb-item"><a href="{{url('/clients')}}"">Edit Client
                </a></li>
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
                          Edit Client
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
   
      <form class="needs-validation" action="{{route('clients.update',$client->client_id)}}" method="POST" novalidate>
            @csrf
            @method("PUT")
            <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Coordonnées personelles</h6>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom01">CIN</label>
                <input max="10" type="text" class="form-control" id="validationCustom01" placeholder="D877 899" name="cin" value=" {{$client->cin}} "  required>
                <div class="invalid-feedback">
                  CIN et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="validationCustom01">Nom</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="nom" name="nom" value=" {{$client->nom}} " required>
                <div class="invalid-feedback">
                  Nom et required
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom02">Prenom </label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="prenom" name="prenom" value=" {{$client->prenom}} "  required>
                <div class="invalid-feedback">
                  prenom et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="validationCustom01">date-naissance</label>
                <input class="form-control datepicker" placeholder="Select date" type="text" name="date_naissance" value=" {{$client->date_naissance}} " required>
                <div class="invalid-feedback">
                  date de naissance et required
                </div>
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
                                  <input type="radio" id="m" name="sexe"
                                   class="custom-control-input" value="M"
                                  @if($client->sexe == "M") checked 
                                   required>
                                  <label class="custom-control-label" for="m">M</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="f"  name="sexe" class="custom-control-input" @else checked @endif required>
                            <label class="custom-control-label" for="f">F</label>
                          </div>
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
                <input type="text" class="form-control" id="mail" value=" {{$client->email}} " name="email"   required>
                <div class="invalid-feedback">
                  Mail et required
                </div>
              </div>
              <div class="col-md-6">
                <label for="tele">Tele</label>
                <input type="text" class="form-control" id="tele" value=" {{$client->tele}} " name="tele" value=" {{old("tele")}} "required>
                <div class="invalid-feedback">
                  Tele et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" value=" {{$client->adresse}} " name="adresse" value=" {{old("adresse")}} " required>
                <div class="invalid-feedback">
                  l'adresse et required
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