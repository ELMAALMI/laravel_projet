@extends('layouts.dash')

@section('contents')
   <!-- Main content -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href=" {{url("/home")}} "><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#"><i class="ni ni-bullet-list-67"></i> Service</a></li>
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
        <div class="card shadow">
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="row">
                  <div class="col">
                    <div class="add-button">
                        <h2 class="heading mb-4 text-center"><i class="ni ni-building"></i> feentech Service & Jobs</h2>
                        <hr>
                    </div>
                    <div class="col">
                        @if (session('status'))
                            <div class="add-button">
                                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong> {{session('status')}} </strong></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Jobs liste</h6>
                    <div class="row mb-3">
                        <div class="col">
                          <div class="add-button">
                          <a href="{{route("service.create",["type"=>"job"])}}">
                             <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#employeeform">
                               <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                               <span class="btn-inner--text">New Job</span>
                             </button>
                            </a>
                          </div>
                        </div>
                        <div class="col-auto">
                            <div class="add-button">
                            <a href="{{route("service.create",["type"=>"service"])}}">
                               <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#employeeform">
                                 <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                 <span class="btn-inner--text">New Service</span>
                               </button>
                              </a>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <div class="table-responsive text-center">
                        <table class="table align-items-center table-flush" id="tabemp">
                            <thead class="thead-light">
                                <tr>
                                <th><i class="ni ni-badge"></i>Job_ID</th>
                                <th><i class="fa fa-calendar"></i> Job Title</th>
                                <th><i class="ni ni-money-coins"></i> Max Salaire</th>
                                <th><i class="ni ni-money-coins"></i> Min Salaire</th>
                                <th><i class="fa fa-plus"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($jobs as $job)
                                <tr>
                                    <th> {{$job->job_id}} </th>
                                    <th> {{$job->job_title}} </th>
                                    <th> {{$job->max_salaire}} </th>
                                    <th> {{$job->max_salaire}} </th>
                                    <th>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{route("service.edit",[$job->job_id,"type"=>"job"])}}" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <form action="{{route("service.destroy",[$job->job_id,"type"=>"job"])}}" method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    
                                                    <button type="submit" class="table-action table-action-delete text-primary" data-toggle="tooltip" data-original-title="supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted mb-4"> <i class="ni ni-bold-right"></i> Service Liste</h6>

                    <div class="col-12 mt-3">
                      <div class="table-responsive text-center">
                        <table class="table align-items-center table-flush" id="tabstagaire">
                                <thead class="thead-light">
                                    <tr>
                                    <th><i class="ni ni-badge"></i> ID</th>
                                    <th><i class="fa fa-calendar"></i> Nom</th>
                                    <th><i class="ni ni-money-coins"></i> date creation</th>
                                    <th><i class="fa fa-plus"></i> Action</th>
                                  </tr>
                                </thead>
                                <tbody class="list">
                                    
                                    @foreach ($services as $service)
                                    <tr>
                                        <th> {{$service->service_id}} </th>
                                        <th> {{$service->nom}} </th>
                                        <th> {{$service->created_at}} </th>
                                        <th>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{route("service.edit",[$service->service_id,"type"=>"service"])}}" class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                                        <i class="fas fa-user-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route("service.destroy",[$service->service_id,"type"=>"service"])}}" method="POST">
                                                        @method("DELETE")
                                                        @csrf
                                                        <button type="submit" class="table-action table-action-delete text-primary" data-toggle="tooltip" data-original-title="supprimer">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    </div>                               
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>   
@endsection