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
            <h1 class="display-2 text-white"> {{$fournisseur->nom}} <img src="{{asset('img/fournisseur/Maroc_Telecom_Logo.png') }}" alt="Image placeholder" style="width: 15%;padding: 12px;">            </h1>
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
            <div class="card-body">
            <form  class="needs-validation" action="{{route("fournisseur.update",$fournisseur->fournisseur_id)}}" method="POST" enctype="multipart/form-data" novalidate>
               
              @method("PUT")
              @csrf
              <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Fournisseur</h6>
            <div class="form-row">
              <div class="col">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control" id="Nom" name="nom" value=" {{$fournisseur->nom}} " required>
                <div class="invalid-feedback">
                  Nom et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="Tele">Tele</label>
                <input type="text" class="form-control" id="Tele" name="tele" value=" {{$fournisseur->tele}} " required>
                <div class="invalid-feedback">
                  Tele et required
                </div>
              </div>
              <div class="col-md-6">
                <label for="Email">Email </label>
                <input type="text" class="form-control" id="Email" name="email" value=" {{$fournisseur->email}} "  required>
                <div class="invalid-feedback">
                  Email et required
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="Adresse">Adresse</label>
                <input class="form-control" type="text" id="Adresse" name="adresse" value=" {{$fournisseur->adresse}} " required>
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
                      <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" name="logo" />
                    </span>
                    <!-- btn-orange -->
                 </div>
              </div>
              <div class="col">            
                <img width="46px" id="logo" src="{{ asset('storage/logofounisseur/'.$fournisseur->logo) }}" alt="your image" />
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