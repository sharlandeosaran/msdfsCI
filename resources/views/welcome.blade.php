@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-md-12">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{route('forma')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Employers/ Employees</h5>
                            </div>
                            <p class="mb-1">Form A</p>
                        </a>
                        <a href="{{route('formb')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Self Employed</h5>
                            </div>
                            <p class="mb-1">Form B</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
