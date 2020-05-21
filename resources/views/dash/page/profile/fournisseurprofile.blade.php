@extends('layouts.dash')

@section('contents')
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 325px; background-image: url({{asset('img/fournisseur.png')}}); background-size: contain; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white"> {{$fournisseur->nom}}<img src="{{asset("storage/logofounisseur/".$fournisseur->logo) }}" alt="Image placeholder" style="width: 50%;padding: 12px;">            </h1>
            <p class="text-white mt-0 mb-5"></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> Profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href=" {{route("fournisseur.edit",$fournisseur->fournisseur_id)}} "  class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            <div class="add-button">
              @if (session("status"))
              <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong> {{status}} </strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
            </div>
            <div class="card-body">
        
                <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Fournisseur</h6>
            <div class="form-row">
              <div class="col">
                <label for="Nom">Nom</label>
              <input type="text" class="form-control" id="Nom" name="nom" value="{{$fournisseur->nom}}"  required>
                <div class="invalid-feedback">
                  Nom et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="Tele">Tele</label>
                <input type="text" class="form-control" id="Tele" name="tele" value="{{$fournisseur->tele}}"  required>
                <div class="invalid-feedback">
                  Tele et required
                </div>
              </div>
              <div class="col-md-6">
                <label for="Email">Email </label>
                <input type="text" class="form-control" id="Email" name="email" value="{{$fournisseur->email}}"  required>
                <div class="invalid-feedback">
                  Email et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="Adresse">Adresse</label>
                <input class="form-control" type="text" name="adreesse" id="Adresse" value="{{$fournisseur->adresse}}" required>
                <div class="invalid-feedback">
                  Adresse et required
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
                      <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');"/>
                    </span>
                    <!-- btn-orange -->
                 </div>
              </div>
              <div class="col">            
                <img width="46px" id="logo" src="{{asset("storage/logofounisseur/".$fournisseur->logo) }}" alt="your image" />
              </div>
            </div>
           </div>
          </div>
        <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Liste des Factures</h6>
        <div class="row">
          <div class="col-8">
            <div id="container">
              <a href="{{route("factures.create",["type"=>"fournisseur","id"=>$fournisseur->fournisseur_id])}}"> 
                <button class="learn-more">
                  <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                  </span>
                  <span class="button-text">New Facture</span>
                </button>
              </a>
            </div>
          </div>
        <div class="table-responsive mt-4">
            <div class="table-responsive">
              <table class="table  text-center" id="tabemp">
                    <thead class="thead-light">
                      <tr>
                        <th>facture id</th>
                        <th>type_payment</th>
                        <th>montements</th>
                        <th>avance</th>
                        <th>reste</th>
                        <th>docs</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      @foreach ($factures as $facture)
                      <tr>
                        <th>
                          <a href="" class="table-action" data-toggle="tooltip" data-original-title="plus">
                            {{$facture->facture_id}}
                          </a>
                        </th>
                        <th> {{$facture->type_payment}} </th>
                        <th> {{$facture->montements}} </th>
                        <th> {{$facture->avance}} </th>
                        <th> {{$facture->reste}} </th>
                        <th>
                          <div class="avatar-group">
                            @foreach(App\Http\Controllers\ProjetController::getdocs($facture->facture_id) as $doc)
                              <a href="#"  data-toggle="modal" data-target="#modal-form" class="avatar avatar-sm rounded-circle">
                                <img alt="docs" src=" {{asset("storage/facture/".$doc->nom)}} " onclick="display(this)" height="100%">
                              </a>
                            @endforeach
                          </div>
                        </th>
                        <td class="table-actions">
                          <div class="row">
                            <div class="col">
                              <a href="{{route("factures.edit",$facture->facture_id)}}" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fas fa-user-edit"></i>
                              </a>
                            </div>
                            <div class="col">
                              <form action="{{route("factures.destroy",$facture->facture_id)}}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="table-action table-action-delete text-primary" data-toggle="tooltip" data-original-title="supprimer">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </form>
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



<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
          <img alt="Image placeholder" src="{{ asset('img/theme/team-1.jpg')}}" width="100%" id="imgdisplay">
        </div>
      </div>
    </div>
  </div>
</div>
                                       
@endsection