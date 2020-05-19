
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
                  <li class="breadcrumb-item"><a href=" {{url("/home")}} "> <i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item"><a href="#"> <i class="ni ni-single-copy-04"></i> Projet</a></li>
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
                          <span class="h2 font-weight-bold mb-0 text-white"> {{$totalrevenu ?? 0}} Dh</span>
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
                          <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Projet</h5>
                          <span class="h2 font-weight-bold mb-0 text-white"> {{$totalprojet ?? 0}} </span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                            <i class="ni ni-single-copy-04"></i>
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
              <!-- Card header -->
              <div class="add-button">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                <i class="fa fa-users mr-2"></i>Projets liste
                            </a>
                        </li>
                    </ul>
                </div>
              </div>
              @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                  {{session('status')}}
                </div>
              @endif
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">                       
                         <!---- employees tables --->
                         <div class="row">
                              <div class="table-responsive">
                                <table class="table  text-center" id="tabemp">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>id</th>
                                            <th>Nom Projet</th>
                                            <th>date Realisation</th>
                                            <th>Etat</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                      @foreach ($projets as $projet)
                                      <tr>
                                        <th>
                                          <a href="{{route("projet.show",$projet->projet_id)}}" class="table-action" data-toggle="tooltip" data-original-title="plus">
                                           {{$projet->projet_id}}
                                          </a>
                                        </th>
                                        <th> {{$projet->nom_projet}} </th>
                                        <th> {{$projet->date_demande}} </th>
                                        <th> {{$projet->etat}} </th>
                                        <td class="table-actions">
                                          <div class="row">
                                            <div class="col">
                                              <a href="{{route("factures.create",["id"=>$projet->projet_id])}}" class="table-action" data-toggle="tooltip" data-original-title="Facture">
                                                  <i class="ni ni-fat-add"></i>
                                              </a>
                                            </div>
                                            <div class="col">
                                                <a href="{{route("projet.edit",[$projet->projet_id,"type"=>"projet"])}}" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <form action="{{route("projet.destroy",[$projet->projet_id,"type"=>"projet"])}}" method="POST">
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
@endsection
  