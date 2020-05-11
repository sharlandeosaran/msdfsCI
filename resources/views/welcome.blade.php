@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-md-12">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h4 class="mb-4 text-">
                        Application form for social assistance for persons who experience loss of or reduced income in respect of the COVID-19 virus.
                    </h4>

                    <div class="list-group">
                        <a href="{{route('forma')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Form A - Employer/ Employee</h5>
                            </div>
                            {{-- <p class="mb-1"></p> --}}
                        </a>
                        <a href="{{route('formb')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Form B - Self Employed</h5>
                            </div>
                            {{-- <p class="mb-1"></p> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
