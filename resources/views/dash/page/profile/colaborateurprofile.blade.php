@extends('layouts.dash')

@section('contents')
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('img/Manufacturer.svg')}}); background-size: 792px;background-repeat: no-repeat; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <h1 class="text-center text-white">
              @if($type == "employee")
              Employee Profile
              @else
              Stagaire Profile
              @endif
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    @if($type == "employee")

    <div class="container-fluid mt--6">
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
                  Jessica Jones<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
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
              <form id="formedit" action="" method="">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">CIN</label>
                        <input type="text" id="input-username" class="form-control" value="D778">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nom</label>
                        <input type="text" id="input-username" class="form-control"  value="lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Prenom</label>
                        <input type="text" id="input-email" class="form-control" value="john">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">date-naissance</label>
                        <input type="text" id="input-first-name" class="form-control"  value="23-12-1998">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">tache</label>
                        <input type="text" id="input-last-name" class="form-control"  value="IT">
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="row">
                      <div class="col">
                          <span>Sexe</span>
                      </div>
                      <div class="w-100"></div>
                      <div class="col"> 
                          <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1"checked name="sexe" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline1">M</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2"  name="sexe" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline2">F</label>
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
                        <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Email</label>
                        <input type="text" id="input-city" class="form-control" placeholder="City" value="john@feentech.com">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Tele</label>
                        <input type="text" id="input-country" class="form-control" placeholder="Country" value="+212679645">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">documents personelles</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />

                    </div>
                    <div class="col-lg-4">
                      <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />

                    </div>
                    <div class="col-lg-4">
                      <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />

                    </div>
                  </div>
                  <div class="add-button" id="button">

                  </div>
                </div>
              </form>
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
  
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary border-0 mb-0">
                <iframe
                  src="{{ asset('doc/formation.pdf')}}"
                  width="800px"
                  height="600px"
                  style="border: none;">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      </div>

      @else
      <div class="container-fluid mt--6">
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
                    Jessica Jones<span class="font-weight-light">, 27</span>
                  </h5>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>Bucharest, Romania
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>University of Computer Science
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
                <form id="formedit" action="" method="">
                  <h6 class="heading-small text-muted mb-4">Stagaire information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">CIN</label>
                          <input type="text" id="input-username" class="form-control" value="D778">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Nom</label>
                          <input type="text" id="input-username" class="form-control"  value="lucky">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Prenom</label>
                          <input type="text" id="input-email" class="form-control" value="john">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">date-naissance</label>
                          <input type="text" id="input-first-name" class="form-control"  value="23-12-1998">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">tache</label>
                          <input type="text" id="input-last-name" class="form-control"  value="IT">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="row">
                        <div class="col">
                            <span>Sexe</span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col"> 
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1"checked name="sexe" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">M</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2"  name="sexe" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">F</label>
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
                          <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-city">Email</label>
                          <input type="text" id="input-city" class="form-control" placeholder="City" value="john@feentech.com">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Tele</label>
                          <input type="text" id="input-country" class="form-control" placeholder="Country" value="+212679645">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Information sur Projet </h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">l'encadrement</label>
                          <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-city">Nom de Projet</label>
                          <input type="text" id="input-city" class="form-control" placeholder="City" value="john@feentech.com">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Tache effectuée</label>
                          <input type="text" id="input-country" class="form-control" placeholder="Country" value="+212679645">
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
                        <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />
                      </div>
                      <div class="col-lg-3">
                        <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />
                      </div>
                      <div class="col-lg-3">
                        <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />
  
                      </div>
                      <div class="col-lg-3">
                        <img class="blah2" id="diplome" src="{{ asset('img/image.png') }}" alt="your image" />
                      </div>
                    </div>
                    <div class="add-button" id="button" style="display: none;">
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
                                  <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" required/>
                                </span>
                             </div>
                          </div>
                          <div class="col">            
                            <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
                          </div>
                          <div class="col">
                            <div class="input-group-btn">
                              <span class="fileUpload btn btn-success">
                                  <span class="upl" id="upload">CV </span>
                                  <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" required/>
                                </span>
                             </div>
                          </div>
                          <div class="col">            
                            <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
                        </div>
                        <div class="row">
                        
                        <div class="col">
                          <div class="input-group-btn">
                            <span class="fileUpload btn btn-success">
                                <span class="upl" id="upload">Assurence </span>
                                <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" required/>
                              </span>
                           </div>
                        </div>
                        <div class="col">            
                          <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
                        </div>
                          <div class="col">
                            <div class="input-group-btn">
                              <span class="fileUpload btn btn-success">
                                  <span class="upl" id="upload">recommandation</span>
                                  <input type="file" class="upload up" id="up" onchange="readURL(this,'#logo');" required/>
                                </span>
                             </div>
                          </div>
                          <div class="col">            
                            <img width="46px" id="logo" src="{{ asset('img/image.png') }}" alt="your image" />
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
      @endif
@endsection