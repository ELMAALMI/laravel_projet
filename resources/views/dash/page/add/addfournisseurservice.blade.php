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
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Colaborateurs</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add new
                  @if($type == "fournisseur")
                      Fournisseur
                  @else
                     Service
                  @endif
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
                          <i class="fa fa-user mr-2"></i>
                          @if($type == "fournisseur")
                            Nouveaux Fournisseur
                          @else
                            Nouveaux Service
                          @endif
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
        @if($type == "fournisseur" )
        <form class="needs-validation" novalidate>
            <div class="add-button">
                <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Coordonnées Fournisseur</h6>
            </div>
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
            <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Payments detail</h6>
        </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="payment"> Type de payment </label>
              <select class="custom-select" id="payment" required>
                <option selected value="conseption">conseption</option>
                <option value="production">production</option>
                <option value="commercialisation">commercialisation</option>
              </select>
              <div class="invalid-feedback">
                Etat et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="montements">Montements</label>
              <input type="text" class="form-control" id="montements" placeholder="1787" required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="Avance">Avance</label>
              <input type="text" class="form-control" id="Avance" placeholder="1787" required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="Reste">Reste</label>
              <input type="text" class="form-control" id="Reste" value="1787" disabled required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
            <div class="form-row">
            <div class="col">
                <label for="Adresse">date demande</label>
                <input class="form-control datepicker" type="text" id="Adresse" placeholder="23-04-2020" required>
                <div class="invalid-feedback">
                    date de Service et obliger
                </div>
            </div>
            <div class="col">
                <label for="payment">date payment</label>
                <input class="form-control datepicker" id="payment" placeholder="Select date" type="text" value="06/20/2018">
                <div class="invalid-feedback">
                    date de payment  et obliger
                </div>
            </div>
        </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="Nombre">Nombre document</label>
              <select class="custom-select" id="Nombre">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
        <div class="add-button">
        <div class="form-row">
          <div class="row" id="docfile">
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">document num 0</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#pic1);" />
                  </span>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col"> 
              <img class="blah" id="pic1" src="http://127.0.0.1:8000/img/image.png" alt="your image" />
            </div>
          </div>
         </div>
        </div>
            <hr>
          <div class="add-button">
           <div class="col">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
           </div>
          </div>
       </form>     

       @else

       <form class="needs-validation" novalidate>
        <div class="add-button">
            <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> + Fournisseur</h6>
        </div>
        <div class="form-row">
            <div class="col">
              <label for="validationCustom01">Nom</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="D877 899"  value="Maroctelecom" disabled>
              <div class="invalid-feedback">
                Nom et required
              </div>
            </div>
          </div>
        <div class="add-button">
            <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Payments detail</h6>
        </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="payment"> Type de payment </label>
              <select class="custom-select" id="payment" required>
                <option selected value="conseption">conseption</option>
                <option value="production">production</option>
                <option value="commercialisation">commercialisation</option>
              </select>
              <div class="invalid-feedback">
                Etat et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="montements">Montements</label>
              <input type="text" class="form-control" id="montements" placeholder="1787" required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="Avance">Avance</label>
              <input type="text" class="form-control" id="Avance" placeholder="1787" required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="Reste">Reste</label>
              <input type="text" class="form-control" id="Reste" value="1787" disabled required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
            <div class="form-row">
            <div class="col">
                <label for="Adresse">date demande</label>
                <input class="form-control datepicker" type="text" id="Adresse" placeholder="23-04-2020" required>
                <div class="invalid-feedback">
                    date de Service et obliger
                </div>
            </div>
            <div class="col">
                <label for="payment">date payment</label>
                <input class="form-control datepicker" id="payment" placeholder="Select date" type="text" value="06/20/2018">
                <div class="invalid-feedback">
                    date de payment  et obliger
                </div>
            </div>
        </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="Nombre">Nombre document</label>
              <select class="custom-select" id="Nombre">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
          <div class="add-button">
            <div class="form-row">
              <div class="row" id="docfile">
                <div class="col">
                  <div class="input-group-btn">
                    <span class="fileUpload btn btn-success">
                        <span class="upl" id="upload">doc1</span>
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
            <hr>
          <div class="add-button">
           <div class="col">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
           </div>
          </div>
     </form> 
       @endif  
    </div>
  </div>
</div>

@endsection