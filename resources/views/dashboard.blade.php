@extends('layouts.app')

@section('content')

<h1 class="mb-4">Dashboard</h1>

<div class="row">

    <div class="col-md-6 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Students</h5>
                <h2>{{ $studentsCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Batches</h5>
                <h2>{{ $batchesCount }}</h2>
            </div>
        </div>
    </div>

</div>

@endsection