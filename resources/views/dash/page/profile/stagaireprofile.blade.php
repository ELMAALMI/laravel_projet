    @extends('layouts.dash')
    @section('contents')
        
    
    <x-alertupdate></x-alertupdate>
      <div class="container-fluid mt--20">
        <div class="row">
          <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
              <img src="{{asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="{{asset('img/theme/team-4.jpg') }}" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-sm btn-info  mr-4 ">Contact</a>
                  <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center">
                      <div>
                        <span class="heading">22</span>
                        <span class="description">Projets</span>
                      </div>
                      <div>
                        <span class="heading">10</span>
                        <span class="description">Rapport</span>
                      </div>
                      <div>
                        <span class="heading">89</span>
                        <span class="description">Salaire</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h5 class="h3">
                  {{$stagaire->nom}}<span class="font-weight-light"></span>
                  </h5>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{$stagaire->adresse}}
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>{{$stagaire->nom_ecole}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          
  
          <div class="col-xl-8 order-xl-1">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Profile </h3>
                  </div>
                  <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary" id="edit">Edit</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form id="formedit" action="{{ route('stagaire.update', ['stagaire' => $stagaire->id ])}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <h6 class="heading-small text-muted mb-4">Stagaire information</h6>
                 <x-errors></x-errors>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">CNE</label>
                        <input type="text" id="input-username" name="cne" class="form-control" value="{{ old('cne', $stagaire->cne ?? null) }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Nom</label>
                          <input type="text" id="input-username" class="form-control" name="nom"  value="{{ old('nom', $stagaire->nom ?? null) }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Prenom</label>
                          <input type="text" id="input-email" class="form-control" name="prenom" value="{{ old('prenom', $stagaire->prenom ?? null) }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">date-naissance</label>
                          <input type="text" id="input-first-name" class="form-control datepicker" name="date_naissance"  value="{{ old('date_naissance', $stagaire->date_naissance ?? null) }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="row">
                          <div class="col">
                              <span>Sexe</span>
                          </div>
                          <div class="w-100"></div>
                          <div class="col"> 
                            <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1"  name="sexe"  @if($stagaire->sexe == 'M') checked @endif value="M" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">M</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2"  name="sexe" @if($stagaire->sexe == 'F') checked @endif value="F"class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">F</label>
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
                          <label class="form-control-label" for="input-address">Address</label>
                          <input id="input-address" class="form-control" placeholder="Home Address" name="adresse" value="{{ old('adresse', $stagaire->adresse ?? null) }}" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-city">Email</label>
                          <input type="text" id="input-city" class="form-control" placeholder="email" name="email" value="{{ old('email', $stagaire->email ?? null) }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Tele</label>
                          <input type="text" id="input-country" class="form-control" placeholder="Phone Number" name="tele" value="{{ old('tele', $stagaire->tele ?? null) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Information sur Projet </h6>
                  <div class="pl-lg-4">
                    
                      {{-- <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">l'encadrement</label>
                          <input id="input-address" class="form-control" placeholder="L'encadrent" name="employee_id" value="{{ old('employee_id', $stagaire->employee->nom ?? null) }}" type="text">
                        </div>
                      </div> --}}
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Encadreant</label>
                        {{-- <input type="text" id="input-last-name" class="form-control"  value="{{$stagaire->job->job_title}}"> --}}
                        <select class="custom-select" type="text" id="input-last-name" class="form-control" name="employee_id" required>
                          @foreach ($employees as $employee)
                          
                          <option   value="{{$employee->id}}" {{$stagaire->employee->id === $employee->id ? 'selected' : null}} >{{$employee->nom}}</option>
                          
                          @endforeach
                          </select>
                      </div>
                    
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-city">Nom de Projet</label>
                          <input type="text" id="input-city" name="nom_projet" class="form-control" placeholder="City" name="nom_projet" value="{{ old('nom_projet', $stagaire->nom_projet ?? null) }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                          <label class="form-control-label" for="input-last-name">tache</label>
                          {{-- <input type="text" id="input-last-name" class="form-control"  value="{{$stagaire->job->job_title}}"> --}}
                          <select class="custom-select" type="text" id="input-last-name" class="form-control" name="job_id" required>
                            @foreach ($jobs as $job)
                            
                            <option   value="{{$job->id}}" {{$stagaire->job->id === $job->id ? 'selected' : null}} >{{$job->job_title}}</option>
                            
                            @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">date-debut</label>
                          <input type="text" id="input-first-name" class="form-control datepicker" name="date_debut"  value="{{ old('date_debut', $stagaire->date_debut ?? null) }}">
                        </div>
                      </div> 
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">date-fin</label>
                          <input type="text" id="input-first-name" class="form-control datepicker" name="date_fin"  value="{{ old('date_fin', $stagaire->date_fin ?? null) }}">
                        </div>
                      </div>
                    </div>


                  </div>
                  <hr class="my-4" />
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">documents personelles</h6>
                  <div class="pl-lg-4" id="olddoc">
                    <div class="row">
                      <div class="col-lg-3">
                      <span class="upl" id="upload">cin</span>
                        <img class="blah2 rounded mt-3 img-fluid"" id="diplome" src="{{ $stagaire->stagairedoc->urlcin() ?? asset('img/image.png') }}" alt="your image" />
                      </div>
                      <div class="col-lg-3">
                        <span class="upl" id="upload">CV</span>
                        <img class="blah2 rounded mt-3 img-fluid"" id="diplome" src="{{ $stagaire->stagairedoc->urlcv() ?? asset('img/image.png') }}" alt="your image" />
                      </div>
                      <div class="col-lg-3">
                        <span class="upl" id="upload">assurance</span>
                        <img class="blah2 rounded mt-3 img-fluid"" id="diplome" src="{{ $stagaire->stagairedoc->urlassurance() ?? asset('img/image.png') }}" alt="your image" />
  
                      </div>
                      <div class="col-lg-3">
                        <span class="upl" id="upload">Lettre</span>
                        <img class="blah2 rounded mt-3 img-fluid"" id="diplome" src="{{ $stagaire->stagairedoc->urlletrre()  ?? asset('img/image.png') }}" alt="your image" />
                      </div>
                    </div>
                    <div class="add-button" >
                      <div class="col">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                      </div>
                    </div>
                  </div>
                  <div class="pl-lg-4" id="newdoc" style="display: none;">
                    <div class="add-button">
                      <div class="form-row">
                        <div class="row">
                          <div class="col">
                            <div class="input-group-btn">
                              <span class="fileUpload btn btn-success">
                                  <span class="upl" id="upload">CIN </span>
                                  <input type="file" name="cindoc" class="upload up" id="up" onchange="readURL(this,'#cin');"/>
                                </span>
                             </div>
                          </div>
                          <div class="col">            
                            <img width="46px"  id="cin"  src="{{ asset('img/image.png') }}" alt="your image" />
                          </div>
                          <div class="col">
                            <div class="input-group-btn">
                              <span class="fileUpload btn btn-success">
                                  <span class="upl" id="upload">CV </span>
                                  <input type="file" name="cvdoc" class="upload up" id="up" onchange="readURL(this,'#cv');"/>
                                </span>
                             </div>
                          </div>
                          <div class="col">            
                            <img width="46px"  id="cv" src="{{ asset('img/image.png') }}" alt="your image" />
                        </div>
                        <div class="row">
                        
                        <div class="col">
                          <div class="input-group-btn">
                            <span class="fileUpload btn btn-success">
                                <span class="upl" id="upload">Assurence </span>
                                <input type="file" name="assurancedoc" class="upload up" id="up" onchange="readURL(this,'#assurance');"/>
                              </span>
                           </div>
                        </div>
                        <div class="col">            
                          <img width="46px"  id="assurance" src="{{ asset('img/image.png') }}" alt="your image" />
                        </div>
                          <div class="col">
                            <div class="input-group-btn">
                              <span class="fileUpload btn btn-success">
                                  <span class="upl" id="upload">recommandation</span>
                                  <input type="file" class="upload up" name="lettredoc" id="up" name="" onchange="readURL(this,'#letrre');" />
                                </span>
                             </div>
                          </div>
                          <div class="col">            
                            <img width="46px"  id="letrre" src="{{ asset('img/image.png') }}" alt="your image" />
                          </div>
    
                        </div>
                        </div>
                       </div>
                    </div>
                  </div>
                    <div class="add-button" id="button" style="display: none;">
                      <div class="col">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
                <hr class="my-4" />

                <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Liste des des Rapports</h6>
                <div class="table-responsive">
                  <div>
                  <table class="table align-items-center">
                      <thead class="thead-light">
                          <tr>
                              <th>id</th>
                              <th>Nom doc</th>
                              <th>date Ajoute</th>
                              <th>date Modification</th>
                              <th>doc</th>
                              <th>action</th>
                          </tr>
                      </thead>
                      <tbody class="list">
                        <tr>
                          <td>ER995</td>
                          <td>docc.pdf</td>
                          <td>23-02-2020</td>
                          <td>00-00-0000</td>
                          <td>
                            <a href="#"  data-toggle="modal" data-target="#modal-form" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="cheque">
                              <img onclick="display(this)" alt="Image placeholder" src="{{ asset('img/doc.svg')}}">
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
        @endsection