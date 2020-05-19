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
            <h1 class="display-2 text-white">Maroctelecom<img src="{{asset('img/fournisseur/Maroc_Telecom_Logo.png') }}" alt="Image placeholder" style="width: 15%;padding: 12px;">            </h1>
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
                  <a href="#!" id="edit" class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            <div class="add-button">
              <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Your update was Success !</strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form id="formedit" class="needs-validation" novalidate>
                <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Fournisseur</h6>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom01">Nom</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="D877 899"  required>
                <div class="invalid-feedback">
                  Nom et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="validationCustom01">Tele</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="06787879879"  required>
                <div class="invalid-feedback">
                  Tele et required
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom02">Email </label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Email"  required>
                <div class="invalid-feedback">
                  Email et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="Adresse">Adresse</label>
                <input class="form-control" type="text" id="Adresse" placeholder="29 Marjane" required>
                <div class="invalid-feedback">
                  Adresse et required
                </div>
              </div>
              <div class="col-md-6">
                  <label for="Adresse">Type de Service</label>
                  <input class="form-control" type="text" id="Adresse" placeholder="FINANCE" required>
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
                      <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" required/>
                    </span>
                    <!-- btn-orange -->
                 </div>
              </div>
              <div class="col">            
                <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
              </div>
            </div>
           </div>
          </div>
          <div class="add-button">
            <div class="col">
             <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update">
            </div>
           </div>
        </form>
        <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Liste des Factures</h6>
        <div class="table-responsive">
          <div>
          <table class="table align-items-center">
              <thead class="thead-light">
                  <tr>
                      <th>id</th>
                      <th>Type de payment</th>
                      <th>Montements</th>
                      <th>Avance</th>
                      <th>Reste</th>
                      <th>date demande</th>
                      <th>date payment</th>
                      <th>doc</th>
                      <th>action</th>
                  </tr>
              </thead>
              <tbody class="list">
                <tr>
                  <td>ER995</td>
                  <td>cheque</td>
                  <td>500</td>
                  <td>500</td>
                  <td>0</td>
                  <td>23-01-2020</td>
                  <td>23-01-2020</td>
                  <td>
                    <div class="avatar-group">
                      <a href="#"  data-toggle="modal" data-target="#modal-form" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="cheque">
                          <img onclick="display(this)" alt="Image placeholder" src="{{ asset('img/theme/team-1.jpg')}}">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="modal" data-target="#modal-form" data-toggle="tooltip" data-original-title="verment">
                          <img onclick="display(this)" alt="Image placeholder" src="{{ asset('img/theme/team-2.jpg')}}">
                      </a>
                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="modal" data-target="#modal-form" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img onclick="display(this)" alt="Image placeholder" src="{{ asset('img/theme/team-3.jpg')}}">
                      </a>
                  </div>
                  </td>
                  <td class="table-actions">
                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                      <i class="fas fa-user-edit"></i>
                    </a>
                    <a href="#!" id="delete" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
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