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
                  <h3 class="mb-0"> Update </h3>
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
            <form  class="needs-validation" novalidate>
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
      </div>
     </div>
   </div>
</div>
                             
@endsection