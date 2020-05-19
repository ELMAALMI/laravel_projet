@extends('layouts.dash')

@section('contents')
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <div class="container">
      <div class="row">
        <div class="col mt-1 order-xl-2">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> <img src="{{asset("img/produitlogo/logo1.png")}}" width="50px"> </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" id="edit" class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            <div class="add-button">
              @if(5<3)
              <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Your update was Success !</strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
            </div>
            <div class="card-body">
            <form id="formedit" class="needs-validation" novalidate method="POST" action=" {{route("produit.update",12)}} ">
              @csrf
              @method("PUT")
                <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Produit</h6>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom01">Nom</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="D877 899"  required>
                <div class="invalid-feedback">
                  Nom et required
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
                 </div>
              </div>
              <div class="col">            
                <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
              </div>
            </div>
           </div>
           <div class="form-row">
            <div class="col">
              <label for="validationCustom01">Etat</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="D877 899"  required>
              <div class="invalid-feedback">
                Etat et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-6">
              <label for="validationCustom01">date-debut</label>
              <input type="text" class="form-control datepicker" id="validationCustom01" placeholder="D877 899"  required>
              <div class="invalid-feedback">
                date et required
              </div>
            </div>
            <div class="col-6">
              <label for="validationCustom01">date-fin</label>
              <input type="text" class="form-control datepicker" id="validationCustom01" placeholder="D877 899"  required>
              <div class="invalid-feedback">
                date et required
              </div>
            </div>
          </div>
          </div>
          <div class="form-row mt-2">
            <div class="col">
                <label for="validationCustom01">description</label>
            <textarea id="summernote" name="decription" required >
              
            </textarea>
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
   </div>
</div>                                       
@endsection