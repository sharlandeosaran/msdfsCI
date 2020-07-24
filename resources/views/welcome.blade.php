@extends('layouts.app')

@section('content')
    <div class="justify-content-center py-4">
        <div class="col-lg-10 col-md-12 offset-lg-1">
            <div class="col-xl-4 offset-xl-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 mb-2">
                <img class="mx-auto d-block" src="{{asset('img/msdfs_logo.png')}}" alt="MSDFS Logo" width="70%">
            </div>

            <div class="card border-primary shadow">
                <div class="card-body">
                    <h4 class="mb-4 text-">
                        Application form for social assistance.
                    </h4>

                    <div class="list-group">
                        <a href="{{route('formcritical')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Critical Incident Form</h3>
                            </div>
                            <p class="mb-1">Short description of form.</p>
                        </a>
                        <a href="{{route('forma')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Form A - Employer/ Employee</h3>
                            </div>
                            <p class="mb-1">Short description of form.</p>
                        </a>
                        <a href="{{route('formb')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Form B - Self Employed</h3>
                            </div>
                            <p class="mb-1">Short description of form.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
