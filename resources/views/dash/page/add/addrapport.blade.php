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
                <li class="breadcrumb-item active" aria-current="page">Employee-rapport</li>
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
                            {{-- <i class="fa fa-user mr-2"></i> --}}
                            <i class="fab fa-buffer"></i>
                        </a>
                    </li>
                </ul>
            </div>
          </div>
          
  <div class="card shadow">
      <div class="card-body">
        <div class="tab-content">
  
        <form class="needs-validation" method="POST" action="{{route('rapport.store')}}" enctype="multipart/form-data" novalidate>
          @csrf
          <x-errors></x-errors>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom01">title</label>
                <input type="text" class="form-control" name="title" id="validationCustom01" placeholder="Title" autocomplete="off"  required>
                <div class="invalid-feedback">
                  title est required
                </div>
              </div>
            </div>
          <div class="add-button">
          <div class="form-row">
            <div class="row">
              <div class="col">
                <div class="input-group-btn">
                  <span class="fileUpload btn btn-success">
                      <span class="upl" id="upload">Rapport</span>
                      <input type="file" class="upload up" name="rapport"  autocomplete="off"/>
                        </span><!-- btn-orange -->
                    </div>
                    <div class="invalid-feedback">
                  Rapport est required
                </div>
              </div>
            </div>
           </div>
          </div>
              <hr>
            <div class="add-button">
             <div class="col">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
             </div>
            </div>
         </form>     
      </div>
    </div>
  </div>
  
    
@endsection