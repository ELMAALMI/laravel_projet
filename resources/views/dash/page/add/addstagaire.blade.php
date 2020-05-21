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
              <li class="breadcrumb-item active" aria-current="page">Add new Stagaire</li>
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
                      </a>
                  </li>
              </ul>
          </div>
        </div>
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
 <form class="needs-validation" method="POST" action="{{route('stagaire.store')}}" enctype="multipart/form-data" novalidate>
        <x-errors></x-errors>
        @method('POST')
        @csrf
  
        <div class="form-row">
          <div class="col">
            <label for="validationCustom01">CNE</label>
            <input type="text" class="form-control" id="validationCustom01" name="cne"  autocomplete="off" placeholder="######" value="{{ old('cne', $stagaire->cne ?? null) }}"  required>
            <div class="invalid-feedback">
              CIN et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">Nom</label>
            <input type="text" class="form-control" id="validationCustom02"  name="nom" autocomplete="off"  value="{{ old('nom', $stagaire->nom ?? null) }}" placeholder="nom"  required>
            <div class="invalid-feedback">
              Nom et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">Prenom </label>
            <input type="text" class="form-control" id="validationCustom03" name="prenom" autocomplete="off"  value="{{ old('prenom', $stagaire->nom ?? null) }}" placeholder="Prenom"  required>
            <div class="invalid-feedback">
              prenom et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">date-naissance</label>
          <input class="form-control datepicker" placeholder="Select date" name="date_naissance" autocomplete="off"  type="text" value="{{ old('date_naissance', $stagaire->date_naissance ?? null) }}" required>
            <div class="invalid-feedback">
              date de naissance et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">Nom Ecole</label>
            <input type="text" class="form-control" id="validationCustom02" name="nom_ecole" autocomplete="off" placeholder="Nom Ecole" value="{{ old('nom_ecole', $stagaire->nome_ecole ?? null) }}" required>
            <div class="invalid-feedback">
              Salaire et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">date-debut</label>
              <input class="form-control datepicker" autocomplete="off" placeholder="Select date" name="date_debut" type="text" value="{{ old('date_debut', $stagaire->date_debut ?? null) }}" required>
            <div class="invalid-feedback">
              date de debut et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">date-fin</label>
            <input class="form-control datepicker" placeholder="Select date" autocomplete="off"  type="text"  name="date_fin" value="{{ old('date_fin', $stagaire->date_fin ?? null) }}" required>
            <div class="invalid-feedback">
              date de debut et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label for="validationCustom01">Mail</label>
            <input type="text" class="form-control" id="validationCustom01" autocomplete="off"  name="email" placeholder="Email" value="{{ old('email', $stagaire->email ?? null) }}"  required>
            <div class="invalid-feedback">
              Mail et required
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02">Tele</label>
            <input type="text" class="form-control" id="validationCustom02" autocomplete="off"   name="tele" placeholder="Phone" value="{{ old('tele', $stagaire->tele ?? null) }}"  required>
            <div class="invalid-feedback">
              Tele et required
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <label for="validationCustom03">Adresse</label>
            <input type="text" class="form-control" id="validationCustom03" autocomplete="off" name="adresse" placeholder="City" value="{{ old('adresse', $stagaire->adresse ?? null) }}"   required>
            <div class="invalid-feedback">
              l'adresse et required
            </div>
          </div>
  
        </div>
        
        
          <div class="col mb-3">
            <label for="validationCustom03">Nom de projet</label>
            <input type="text" class="form-control" id="validationCustom03" name="nom_projet" autocomplete="off"  placeholder="Nom de prjet"  value="{{ old('nom_projet', $stagaire->nom_projet ?? null) }}"   required>
            <div class="invalid-feedback">
              nom de projet est required
            </div>
          </div>

          <div class="form-group">
            <label class="form-control-label" for="input-last-name">Encadreant</label>
            {{-- <input type="text" id="input-last-name" class="form-control"  value="{{$stagaire->job->job_title}}"> --}}
            <select class="custom-select" type="text" id="input-last-name" class="form-control" name="employee_id"  required>
              @foreach ($employees as $employee)
              
              <option   value="{{$employee->id}}" >{{$employee->nom}}</option>
              
              @endforeach
              </select>
          </div>
        

          
        
      </div>

      <div class="col"> 
        <label for="validationCustom03">Sexe     :</label>
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadioInline1"  name="sexe"  value="{{ old('sexe', $stagaire->adresse ?? 'M') }}" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">M</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2"  name="sexe"  value="{{ old('sexe', $stagaire->adresse ?? 'F') }}"   class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">F</label>
          </div>
      </div>

    <div class="add-button">
        <div class="form-row">
          <div class="row">
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">CIN Image</span>
                    <input type="file" class="upload up" id="up" class="form-control" name="cindoc"   onchange="readURL(this,'#cin');" />
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
                    <input type="file" class="upload up" class="form-control" id="up"  name="cvdoc" onchange="readURL(this,'#diplome');" />
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
                    <input type="file" class="upload up" id="up" class="form-control" name="assurancedoc" onchange="readURL(this,'#contrat');" />
                  </span><!-- btn-orange -->
               </div>
            </div>
            <div class="col">
              <div class="input-group-btn">
                <span class="fileUpload btn btn-success">
                    <span class="upl" id="upload">lettre recommandation</span>
                    <input type="file" class="upload up" id="up" class="form-control" name="lettredoc" onchange="readURL(this,'#lettre');" />
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
              <img class="blah" id="lettre" src="{{ asset('img/image.png') }}" alt="your image" />
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
        
    </div>
  </div>
</div>

@endsection
