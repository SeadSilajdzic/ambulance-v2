@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-primary">
                <div class="card-content d-flex justify-content-around">
                    <div class="inner col-4 border-right">
                        <h3>{{ $appointments }}</h3>
                        <p>Total Appointments</p>
                    </div>
                    <div class="inner col-4 border-right">
                        <h3>{{ $appointmentRequests }}</h3>
                        <p>Appointment Requests</p>
                    </div>
                    <div class="inner col-4">
                        <h3>{{ $appointmentsReadyToWorkOn }}</h3>
                        <p>Appointments Available To Work On</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <a href="{{ route('users.index') }}" class="small-box-footer" style="color: white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    <a href="{{ route('reception.index') }}" class="small-box-footer" style="color: white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    <a href="{{ route('appointments.index') }}" class="small-box-footer" style="color: white">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $patients }}</h3>
                    <p>Patients</p>
                </div>
                <a href="{{ route('patients.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>User Registrations</p>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
