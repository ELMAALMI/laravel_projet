@extends('layouts.dash')

@section('contents')
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('img/Manufacturer.svg')}}); background-size: 792px;background-repeat: no-repeat; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <h1 class="text-center text-white">
             Client Profile
            </h1>
          </div>
        </div>
      </div>
    </div>  
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href=" {{route("clients.edit",$client->client_id)}} " class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form id="formedit" action="" method="">
                <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Coordonnées personelles</h6>
                <div class="form-row">
                  <div class="col">
                    <label for="CIN">CIN</label>
                    <input type="text" class="form-control" id="CIN" value=" {{$client->cin}} " name="cin"  required>
                    <div class="invalid-feedback">
                      CIN et required
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" value=" {{$client->nom}} " name="nom" required>
                    <div class="invalid-feedback">
                      Nom et required
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="Prenom">Prenom </label>
                    <input type="text" class="form-control" id="Prenom" value=" {{$client->prenom}} " name="prenom"  required>
                    <div class="invalid-feedback">
                      prenom et required
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="date-naissance">date-naissance</label>
                    <input class="form-control datepicker" id="date-naissance" type="text" value=" {{$client->date_naissance}} " name="date_naissance" required>
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
                                      <input type="radio" id="m" name="sexe" class="custom-control-input" value="M"
                                      @if($client->sexe == "M") checked @endif
                                      required>
                                      <label class="custom-control-label" for="m">M</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="f" name="sexe" class="custom-control-input" value="F"
                                @if($client->sexe == "F") checked @endif
                                required>
                                <label class="custom-control-label" for="f">F</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="Address">Address</label>
                        <input id="Address" class="form-control" value=" {{$client->adresse}} " type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="Email">Email</label>
                        <input type="text" id="Email" class="form-control" value=" {{$client->email}} ">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="Tele">Tele</label>
                        <input type="text" id="Tele" class="form-control" value=" {{$client->tele}} ">
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </form>
              <h6 class="heading-small text-muted mb-4 ml-4"><i class="ni ni-bold-right"></i> Liste des des Projets</h6>
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
                              <a href="{{route("projet.create",["type"=>"facture","id"=>$projet->projet_id])}}" class="table-action" data-toggle="tooltip" data-original-title="Facture">
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
@endsection