@extends('layouts.dash')
@section('contents')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Colaborateurs</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add new colaborateur</li>
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
                          @if($type == "employee")
                            New Employee
                          @endif
                          @if ($type == "stagaire")
                            New Stagaire
                          @else
                              
                          @endif
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
        @if($type == "employee")
        <form class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col">
              <label for="validationCustom01">CIN</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="D877 899"  required>
              <div class="invalid-feedback">
                CIN et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="validationCustom01">Nom</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="nom"  required>
              <div class="invalid-feedback">
                Nom et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Prenom </label>
              <input type="text" class="form-control" id="validationCustom03" placeholder="prenom"  required>
              <div class="invalid-feedback">
                prenom et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="validationCustom01">date-naissance</label>
              <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018">
              <div class="invalid-feedback">
                date de naissance et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Salaire</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
              <div class="invalid-feedback">
                Salaire et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="validationCustom01">Mail</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
              <div class="invalid-feedback">
                Mail et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Tele</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
              <div class="invalid-feedback">
                Tele et required
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col mb-3">
              <label for="validationCustom03">Adresse</label>
              <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
              <div class="invalid-feedback">
                l'adresse et required
              </div>
            </div>
            <div class="col mb-3">
              <label for="validationCustom03">Tache</label>
              <select class="custom-select" required>
                <option selected>Zero</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="container">
              <div class="row">
                <div class="col-2">
                  <span>Crée Compte</span>
                </div>
                <div class="col-1">
                  <span>
                    <label class="custom-toggle">
                      <input type="checkbox" checked>
                      <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                    </label>
                  </span>
                </div>
              </div>
            </div>
          </div>
         
        <div class="add-button">
        <div class="form-row">
          <div class="row">
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">CIN Image</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#cin');" />
                  </span><!-- btn-orange -->
               </div>
              <div class="invalid-feedback">
                Image cin et required
              </div>
            </div>
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">Contrat Image</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#diplome');" />
                  </span><!-- btn-orange -->
               </div>
              <div class="invalid-feedback">
                Image cin et required
              </div>
            </div>
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">Diplome Image</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#contrat');" />
                  </span><!-- btn-orange -->
               </div>
            </div>
            <div class="w-100"></div>
            <div class="col">            
              <img class="blah" id="cin" src="{{ asset('img/image.png') }}" alt="your image" />
              <div class="invalid-feedback">
                Image cin et required
              </div>
            </div>
            <div class="col">            
              <img class="blah" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />
            </div>
            <div class="col">            
              <img class="blah" id="contrat" src="{{ asset('img/image.png') }}" alt="your image" />
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
        <div class="form-row">
          <div class="col">
            <label for="validationCustom01">CIN</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="D877 899"  required>
            <div class="invalid-feedback">
              CIN et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">Nom</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="nom"  required>
            <div class="invalid-feedback">
              Nom et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">Prenom </label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="prenom"  required>
            <div class="invalid-feedback">
              prenom et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">date-naissance</label>
              <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018">
            <div class="invalid-feedback">
              date de naissance et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">Nom Ecole</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
            <div class="invalid-feedback">
              Salaire et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">date-debut</label>
              <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018">
            <div class="invalid-feedback">
              date de debut et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">date-fin</label>
            <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018">
            <div class="invalid-feedback">
              date de debut et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">Mail</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
            <div class="invalid-feedback">
              Mail et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">Tele</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
            <div class="invalid-feedback">
              Tele et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <label for="validationCustom03">Adresse</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
            <div class="invalid-feedback">
              l'adresse et required
            </div>
          </div>
          <div class="col mb-3">
            <label for="validationCustom03">Departement</label>
            <select class="custom-select" required>
              <option selected>Zero</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <label for="validationCustom03">l'Encadrant</label>
            <select class="custom-select" required>
              <option selected>Zero</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col mb-3">
            <label for="validationCustom03">Nom de projet</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
            <div class="invalid-feedback">
              l'adresse et required
            </div>
          </div>
        </div>

    <div class="add-button">
        <div class="form-row">
          <div class="row">
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">CIN Image</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#cin');" />
                  </span><!-- btn-orange -->
               </div>
              <div class="invalid-feedback">
                Image cin et required
              </div>
            </div>
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">CV Image</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#diplome');" />
                  </span><!-- btn-orange -->
               </div>
              <div class="invalid-feedback">
                Image cin et required
              </div>
            </div>
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">assurence Image</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#contrat');" />
                  </span><!-- btn-orange -->
               </div>
            </div>
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">lettre recommandation</span>
                    <input type="file" class="upload up" id="up" onchange="readURL(this,'#contrat');" />
                  </span><!-- btn-orange -->
               </div>
            </div>
            <div class="w-100"></div>
            <div class="col">            
              <img class="blah" id="cin" src="{{ asset('img/image.png') }}" alt="your image" />
              <div class="invalid-feedback">
                Image cin et required
              </div>
            </div>
            <div class="col">            
              <img class="blah" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />
            </div>
            <div class="col">            
              <img class="blah" id="contrat" src="{{ asset('img/image.png') }}" alt="your image" />
            </div>
            <div class="col">            
              <img class="blah" id="contrat" src="{{ asset('img/image.png') }}" alt="your image" />
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