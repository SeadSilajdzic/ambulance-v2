@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Electronic Medical Records for - {{ $user->name }}</h1>
                    <small class="text-muted">Patient has {{ count($user->appointments) }} appointments in total</small>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <table class="table">
        <thead>
            <th>Appointment title</th>
            <th>Status</th>
            <th>Appointed for</th>
            <th>Created at</th>
            <th>View</th>
            <th>Edit</th>
        </thead>
        <tbody>
            @foreach($user->appointments as $appointment)
                <tr>
                    <td>{{ $appointment->appointment_title }}</td>
                    <td>{{ $appointment->appointmentStatus->name }}</td>

                    @if($appointment->appointment_date)
                        @if($appointment->appointment_date < Carbon\Carbon::today())
                            <td class="alert alert-danger d-flex justify-content-between">{{ $appointment->appointment_date->toFormattedDateString() }}
                                <a href="#" class="btn btn-sm btn-info">ReAppoint</a>
                            </td>
                        @else
                            <td>{{ $appointment->appointment_date->toFormattedDateString() }}</td>
                        @endif
                    @else
                        <td>There is no date defined</td>
                    @endif


                    <td>{{ $appointment->created_at->toFormattedDateString() }} ({{ $appointment->created_at->diffForHumans() }})</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
