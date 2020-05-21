@extends('layouts.dash')

@section('contents')

   <x-alertupdate></x-alertupdate>
    <div class="container-fluid mt-20">
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
               
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">{{$employee->rapports->count()}}</span>
                      <span class="description">Rapport</span>
                    </div>
                    <div>
                      <span class="heading">{{$employee->salaire}}</span>
                      <span class="description">Salaire</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                {{ $employee->nom}}<span class="font-weight-light"></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{$employee->adresse}}
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
            <form id="formedit" action="{{ route('employee.update', ['employee' => $employee->id ])}}" method="POST">
              @method('PUT')
              @csrf
              
                <h6 class="heading-small text-muted mb-4">User information</h6>
              
                <x-errors></x-errors>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">CIN</label>
                        <input type="text" id="input-username" class="form-control" name="cin" value="{{$employee->cin}}">
                        <x-alerterror nameerror="cin"></x-alerterror>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nom</label>
                        <input type="text" id="input-username" class="form-control" name="nom" value="{{$employee->nom}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Prenom</label>
                        <input type="text" id="input-email" class="form-control" name="prenom" value="{{$employee->prenom}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">date-naissance</label>
                        <input type="text" id="input-first-name" class="form-control datepicker" name="date_naissance"  value="{{$employee->date_naissance}}" placeholder="YYYY-MM-DD">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">tache</label>
                        {{-- <input type="text" id="input-last-name" class="form-control"  value="{{$employee->job->job_title}}"> --}}
                        <select class="custom-select" type="text" id="input-last-name" class="form-control" name="job_id" required>
                          @foreach ($jobs as $job)
                          
                          <option   value="{{$job->id}}" {{$employee->job->id === $job->id ? 'selected' : null}} >{{$job->job_title}}</option>
                          
                          @endforeach
                          </select>
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
                          <input type="radio" id="customRadioInline1"  name="sexe"  @if($employee->sexe == 'M') checked @endif value="M" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline1">M</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2"  name="sexe" @if($employee->sexe == 'F') checked @endif value="F"class="custom-control-input">
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
                        <input id="input-address" class="form-control" name="adresse" placeholder="Home Address" value="{{ old('adresse', $employee->adresse ?? null) }}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Email</label>
                        <input type="text" id="input-city" class="form-control" placeholder="City" name="email"  value="{{ old('email', $employee->email ?? null) }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Tele</label>
                        <input type="text" id="input-country" class="form-control" placeholder="Country" name="tele"  value="{{ old('tele', $employee->tele ?? null) }}">
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
                    <span class="upl" id="upload"><a href="{{$employee->employeedoc->urlcin()}}" target="_blank"> CIN Image</a>  </span>
                    
                      <img class="blah2 rounded mt-3 img-fluid"" id="diplome" width="46px" src="{{$employee->employeedoc->urlcin() ?? asset('img/image.png') }}" alt="your image" />

                  </div>
                    <div class="col-lg-4">
                      {{-- <span class="upl" id="upload">Diplome Image</span> --}}
                      <span class="upl" id="upload"><a href="{{$employee->employeedoc->urldiplome()}}" target="_blank">Diplome Image</a> </span>
                      <img class="blah2 rounded mt-3 img-fluid"" id="diplome" width="46px" src="{{ $employee->employeedoc->urldiplome() ??  asset('img/image.png') }}" alt="your image" />

                    </div>
                    <div class="col-lg-4">
                      
                      <span class="upl" id="upload"><a href="{{$employee->employeedoc->urldiplome()}}" target="_blank"> Contrat Image</a> </span>
                      <img class="blah2 rounded mt-3 img-fluid" id="diplome"   src="{{$employee->employeedoc->urlcontrat() ??  asset('img/image.png') }}" alt="your image" />

                    </div>
                  </div>

                                     
                  <div class="add-button" id="button">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                  </div>
                </div>
               
              </form>
              <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Liste des des Rapports</h6>
              <div class="add-button">
                <a href="{{route("rapport.create")}}">
                 <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#employeeform">
                   <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                   <span class="btn-inner--text">New Rapport</span>
                 </button>
                </a>
              </div>
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

                      @forelse ($employee->rapports as $rapport)
                      <tr>
                        <td>{{$rapport->id}}</td>
                        <td>{{$rapport->title}}</td>
                        <td>{{$rapport->created_at}}</td>
                        <td>{{$rapport->updated_at}}</td>
                        <td>
                          <a href="{{$rapport->url()}}"  target="_blank" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="show rapport">
                            <img onclick="display(this)" alt="Image placeholder" src="{{ asset('img/doc.svg')}}">
                            </a>
                        </div>
                        </td>
                        <td class="table-actions">
                          <a href="{{ route('rapport.edit', ['rapport' => $rapport->id]) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                            <i class="fas fa-user-edit"></i>
                          </a>
                          
                              <form action="{{route("rapport.destroy",$rapport->id)}}" method="POST">
                                  @method("DELETE")
                                  @csrf
                                  <button type="submit" class="table-action table-action-delete text-primary" data-toggle="tooltip" data-original-title="delete">
                                      <i class="fas fa-trash"></i>
                                  </button>
                              </form>
                        </td>
                      </tr>
                      @empty
                         no Rapport(s) Yet 
                      @endforelse
                     
                    </tbody>
                </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
