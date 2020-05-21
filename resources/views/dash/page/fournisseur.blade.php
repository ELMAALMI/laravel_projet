@extends('layouts.dash')

@section('contents')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-users"></i> Fournisseurs</a></li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-6">
          <div class="card bg-gradient-default">
            <div class="card-body"> 
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total dépenses </h5>
                  <span class="h2 font-weight-bold mb-0 text-white"> {{$montement ?? "0"}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card bg-gradient-default">
            <div class="card-body"> 
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Fournisseur</h5>
                  <span class="h2 font-weight-bold mb-0 text-white"> {{$totalfournisseur ?? "0"}} </span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                    <i class="ni ni-circle-08"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card shadow">
          <div class="card-body">
            <div class="add-button">
              <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                      <i class="ni ni-support-16"></i> Liste des fournissuers
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row ">
              <div class="col-8">
                <div id="container">
                  <a href="{{route("fournisseur.create")}}"> 
                    <button class="learn-more">
                      <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                      </span>
                      <span class="button-text">New Fournisseur</span>
                    </button>
                  </a>
                </div>
              </div>
              
            </div>
                  
              <div class="col-12">
                <div class="row">
                    <div class="col-12 mt-3">
                      <div class="table-responsive text-center">
                        <table class="table align-items-center table-flush" id="tabstagaire">
                          <thead class="thead-light">
                            <tr>
                              <th><i class="ni ni-badge"></i>ID</th>
                              <th><i class="fa fa-calendar"></i> Nom</th>
                              <th><i class="fa fa-calendar"></i> logo</th>
                              <th><i class="ni ni-money-coins"></i> tele</th>
                              <th><i class="ni ni-money-coins"></i> email</th>
                              <th><i class="ni ni-money-coins"></i> adresse</th>
                              <th><i class="fa fa-plus"></i> Action</th>
                            </tr>
                          </thead>
                          <tbody class="list">
                            @foreach ($fournisseurs as $fournisseur)
                              <tr>
                                <th><a href="{{ route("fournisseur.show",$fournisseur->fournisseur_id) }} " data-toggle="tooltip" data-placement="top" title="profile">{{$fournisseur->fournisseur_id}} </a> </th>
                                <th>{{$fournisseur->nom}}</th>
                                <th><img src="{{asset("storage/logofounisseur/".$fournisseur->logo)}}" width="39px"> </th>
                                <th>{{$fournisseur->tele}}</th>
                                <th>{{$fournisseur->email}}</th>
                                <th>{{$fournisseur->adresse}}</th>
                                <td class="table-actions">
                                  <div class="row">
                                    <div class="col">
                                     <a href="{{route("fournisseur.destroy",$fournisseur->fournisseur_id)}}" class="table-action" data-toggle="tooltip" data-placement="left" title="add facture"">
                                       <i class="ni ni-fat-add"></i>
                                    </a>
                                  </div>
                                  <div class="col">
                                    <a href="{{route("fournisseur.edit",$fournisseur->fournisseur_id)}}" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                      <i class="fas fa-user-edit"></i>
                                    </a>
                                  </div>
                                  <div class="col">
                                      <form action="{{route("fournisseur.destroy",$fournisseur->fournisseur_id)}}" method="POST">
                                          @method("DELETE")
                                          @csrf
                                          <button type="submit" class="table-action table-action-delete text-primary" data-toggle="tooltip" data-original-title="supprimer">
                                              <i class="fas fa-trash"></i>
                                          </button>
                                      </form>
                                  </div>
                                </div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                       </div>
                     </div>
                   </div>
                  </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="add-button">
                      <div id="container">
                        <a href="{{route("fournisseurservice.create")}}"> 
                          <button class="learn-more">
                            <span class="circle" aria-hidden="true">
                              <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">New service</span>
                          </button>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive text-center">
                        <table class="table align-items-center table-flush" id="tabemp">
                          <thead class="thead-light">
                            <tr>
                              <th><i class="ni ni-badge"></i>Service_ID</th>
                              <th><i class="fa fa-calendar"></i> Nom</th>
                              <th><i class="ni ni-money-coins"></i> Date d'ajoute</th>
                              <th><i class="fa fa-plus"></i> Action</th>
                            </tr>
                          </thead>
                          <tbody class="list">
                            @foreach ($services as $service)
                              <tr>
                                <th> {{$service->service_id}} </th>
                                <th> {{$service->nom}} </th>
                                <th> {{$service->created_at}} </th>
                                <td class="table-actions">
                                  <div class="row">
                                    <div class="col">
                                        <a href="{{route("fournisseurservice.edit",$service->service_id)}} " class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <form action="{{route("fournisseurservice.destroy",$service->service_id)}}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="table-action table-action-delete text-primary" data-toggle="tooltip" data-original-title="supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                       </div>
                     </div>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
        </div>  
      </div>
    </div>
  </div>
</div>
@endsection
  

