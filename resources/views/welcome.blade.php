@extends('layouts.front-layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center pl-5 pr-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Crud
                </div>

                <div class="card-body">
                    @livewire('contacts')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection