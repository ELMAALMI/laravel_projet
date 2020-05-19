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
              <li class="breadcrumb-item"><a href="{{url('/produit')}}"">Projet detail</a></li>
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
                          Projet Detail
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
      <div class="tab-content">
        <div class="row">
          <div class="col-11">
            <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Projet detail</h6>
          </div>
          <div class="col-auto">
            <a href=" {{route("projet.edit",[$projet->projet_id,"type"=>"projet"])}} " class="btn btn-sm btn-primary">Edit</a>
          </div>
        </div>
            <div class="form-row">
              <div class="col">
                <label for="nomprojet">Nom de projet</label>
                <input type="text" class="form-control" id="nomprojet"value="{{$projet->nom_projet}}">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="date_demande">date demande </label>
                <input class="form-control" id="date_demande"value="{{$projet->date_demande}}" type="text" >
              
              </div>
              <div class="col-md-6">
                <label for="date_livraison">date livraison </label>
                <input class="form-control"id="date_livraison" value="{{$projet->date_livraison}}" type="text" >
              </div>
            </div>
            <div class="form-row mt-3 mb-3">
              <div class="col">
                <label for="summernote">description</label>
                <textarea id="summernote" name="description">{{html_entity_decode($projet->description)}}</textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="etat"> Etat </label>
                <input type="text" class="form-control" id="etat"  value="{{$projet->etat}}"">
              </div>
              <div class="col-md-6">
                <label for="Service">Service</label>
                <input type="text" class="form-control" id="etat"  value="{{App\Service_type::find($projet->service_id)->nom}}"">
              </div>
        </div>
    </div>
  </div>
<h6 class="heading-small text-muted mb-4 ml-4"><i class="ni ni-bold-right"></i> Liste des Factures</h6>
<div class="add-button">
  <a href="{{route("factures.create",["id"=>$projet->projet_id])}}">
     <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#employeeform">
       <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
       <span class="btn-inner--text">New Facture</span>
     </button>
    </a>
  </div>
</div>
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
                <a href="{{route("projet.show",$facture->facture_id)}}" class="table-action" data-toggle="tooltip" data-original-title="plus">
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
              </div>
            </td>
         </tr>
        @endforeach
    </tbody>
  </table>
</div>
<!-- display docs -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
          <img src="" id="imgdisplay" width="200%">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection