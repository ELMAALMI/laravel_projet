
@extends('layouts.dash')

@section('contents')
   <!-- Main content -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-users"></i> Colaborateurs</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row mb-4">
            <div class="col-lg-6">
              <div class="card bg-gradient-default">
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Revunu</h5>
                          <span class="h2 font-weight-bold mb-0 text-white"> {{$totalrevenu}} Dh</span>
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
                          <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Clients</h5>
                          <span class="h2 font-weight-bold mb-0 text-white"> {{$totalclient}} </span>
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
    <div class="col-6">
      <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
        <div class="card-header bg-transparent">
            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Top Client</h4>
        </div>
        <div class="card-body px-lg-7">
            <div class="display-2 text-white">
               {{$topclient["nbprojet"] ?? ''}}
               Projet
            </div>
            <span class=" text-white">by {{ $topclient["client"]->nom ?? ''}}</span>
        </div>
        <div class="card-footer bg-transparent">
            <a href=" {{route("clients.show",$topclient["client"]->client_id ?? '')}} ">
              <button type="button" class="btn btn-primary mb-3">Plus</button>
            </a>
        </div>
    </div>
    </div>
    <div class="col-6 mb-6">
      <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
        <div class="card-header bg-transparent">
            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Top Projet</h4>
        </div>
        <div class="card-body px-lg-7">
            <div class="display-2 text-white"> {{$topprojet["montements"] ?? ''}} Dh</div>
            <span class=" text-white">by {{$topprojet["projet"]->nom_projet ?? ''}} </span>
        </div>
        <div class="card-footer bg-transparent">
          <a href=" {{route("projet.show",$topprojet["projet"]->projet_id ?? '')}} ">
            <button type="button" class="btn btn-primary mb-3">Plus</button>
          </a>
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
                                <i class="fa fa-users mr-2"></i>Employees liste
                            </a>
                        </li>
                    </ul>
                </div>
              </div>
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{session('status')}}
                </div>
              @endif
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <div class="row mb-3">
                          <div class="col">
                            <div class="add-button">
                            <a href="{{route("clients.create",["type"=>"client"])}}">
                               <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#employeeform">
                                 <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                 <span class="btn-inner--text">New Client</span>
                               </button>
                              </a>
                            </div>
                          </div>
                        </div>                       
                         <!---- employees tables --->
                         <div class="row">
                              <div class="table-responsive">
                                <table class="table align-items-center table-flush text-center" id="tabemp">
                                  <thead class="thead-light">
                                    <tr>
                                      <th><i class="ni ni-badge"></i> ID</th>
                                      <th><i class="ni ni-single-02"></i> NOM</th>
                                      <th><i class="ni ni-single-02"></i> PRENOM</th>
                                      <th><i class="fa fa-calendar"></i> naissance</th>
                                      <th><i class="ni ni-email-83"></i> Mail</th>
                                      <th><i class="ni ni-mobile-button"></i> Tele </th>
                                      <th><i class="ni ni-briefcase-24"></i> nb projet</th>
                                      <th><i class="ni ni-briefcase-24"></i> Action</th>
                                    </tr>
                                  </thead>
                                  <tbody class="list">
                                     
                                    @forelse ($clients as $client)
                                    <tr>
                                      <th data-toggle="tooltip" data-placement="top" title="profile">
                                        <a href=" {{route("clients.show",$client->client_id)}} "> {{ $client->client_id }} </a>
                                      </th>
                                      <th> {{$client->nom}} </th>
                                      <th> {{$client->prenom}} </th>
                                      <th> {{$client->date_naissance}}</th>
                                      <th> {{$client->email}} </th>
                                      <th> {{$client->tele}} </th>
                                      <th> {{ App\Http\Controllers\ClientController::nbofprojet($client->client_id)->nb}} </th>
                                      <td class="table-actions">
                                        <div class="row">
                                          <div class="col-2">
                                            <a href="{{route("projet.create",["type"=>"projet","id"=>$client->client_id])}}" class="table-action" data-toggle="tooltip" data-original-title="add">
                                              <i class="ni ni-fat-add"></i>
                                            </a>
                                        </div>
                                          <div class="col-2">
                                              <a href="{{route("clients.edit",$client->client_id)}} " class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                                  <i class="fas fa-user-edit"></i>
                                              </a>
                                          </div>
                                          <div class="col-2">
                                              <form action="{{route("clients.destroy",$client->client_id)}}" method="POST">
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
                                    @empty
                                    @endforelse
                                  </tbody>
                                </table>
                            </div>
                    </div>
                  </div>
          </div>
      </div>
  </div>    
@endsection
  