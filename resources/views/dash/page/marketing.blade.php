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
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-mail-bulk"></i> Marketing</a></li>
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
                      <form class="needs-validation" method="post" action="" novalidate>
                        @csrf
                        <div class="add-button">
                          <h2 class="heading mb-4 text-center"><i class="fa fa-mail-bulk"></i> Emailing Marketing</h2>
                          <hr>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <label for="validationCustom01">Subject</label>
                              <input type="text" class="form-control" id="validationCustom01"  name="subject" required>
                              <div class="invalid-feedback">
                                Subject et required
                              </div>
                          </div>
                        </div>
                        <div class="form-row mt-2">
                          <div class="col">
                            <label for="validationCustom01">Mail</label>
                            <textarea id="summernote" name="mail" required></textarea>
                          </div>
                        </div>
                        <div class="add-button">
                          <div class="col">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> Envoyer</button>
                          </div>
                        </div>                                    
                      </form>
                    </div>
                </div>
              </div>
            </div>
            <!-- emailing list -->
            <div class="add-button">
                <h2 class="heading mb-4 text-center"><i class="fa fa-mail-bulk"></i> Emailing liste management</h2>
                <hr>
            </div>
            <div class="tab-content">
              <div class="show" id="tabs-icons-text-1">
                <div class="row">
                  <div class="col-12">
                    <div class="add-button">
                      <form class="needs-validation" method="post" action="{{url("import")}}" enctype="multipart/form-data" novalidate>
                        @csrf 
                        <div class="form-row">
                          <div class="col">
                            <label for="list">Mail liste</label>
                              <input type="file" class="form-control" id="list"  name="list" required>
                              <div class="invalid-feedback">
                                list et required
                              </div>
                          </div>
                        </div>
                        <div class="form-row mt-2">
                          <div class="col">
                            <button type="submit" class="btn btn-primary btn-block"><i class="ni ni-spaceship" aria-hidden="true"></i> Save</button>
                          </div>
                        </div>                                    
                      </form>
                      <h6 class="heading-small text-muted mb-4 mt-4"><i class="ni ni-bold-right"></i> Autre option</h6>
                      <div class="row mt-2">
                        <div class="col-6">
                          <form action=" {{route("marketing.destroy",1)}} " method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-primary btn-block"><i class="ni ni-settings-gear-65" aria-hidden="true"></i> vide la liste</button>
                          </form>
                        </div>
                        <div class="col-6">
                          <a href=" {{url("export")}} ">
                            <button type="submit" class="btn btn-primary btn-block"><i class="ni ni-paper-diploma" aria-hidden="true"></i> Dowland list</button>
                          </a>
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