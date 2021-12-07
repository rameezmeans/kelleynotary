@extends('layouts.admin')
@section('title', 'All real state closing assignments')
@section('main-content')

    <!-- Page Heading -->
    <h5 class="mb-4 text-gray-800">{{ __('Client Dashboard >  All real state closing assignments') }}</h5>
    <hr/>

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            

          <table class="table table-bordered">
            <tr class="thead-light">
              <th>Assignment Title</th>
              <th>Assignment <br/> Date & Time</th>
              <th>Client Name</th>
              <th>Client Email</th>
              <th>Closing Type</th>
              <th>Fax Backs</th>
              <th>City</th>
              <th>State</th>
              <th>Zip</th>
              <th>Status</th>
              <th>Options</th>
            </tr>

            @foreach($datas as $data)

              <tr>
                <td>{{$data->assignment_title}}</td>
                <td>
                  {{ date('M d, Y', strtotime($data->date_of_assignment)) }} @ {{ date('h:i:sa', strtotime($data->time_of_assignment)) }}
                </td>                
                
                <td>{{App\User::find($data->client_id)->name}}</td>
                <td>{{App\User::find($data->client_id)->email}}</td>
                <td>{{$data->select_closing_type}}</td>
                <td>{{$data->fax_backs}}</td>
                <td>{{$data->city}}</td>
                <td>{{$data->state}}</td>
                <td>{{$data->zip}}</td>
                <td>
                  <?php
                    $abc = new App\Http\Controllers\ClientController;
                    echo $abc->getStatus($data->status);
                  ?>
                </td>

                <td>
                  <a href="{{route('client.assignment.real_state_closing.view.hash', $data->hash)}}" class="btn btn-link">View</a> | &nbsp;
                  <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('client.assignment.realstate.view.all')}}?do=delete&for={{$data->hash}}" style="color: red;">Delete</a>
                </td>
              </tr>

            @endforeach
          </table>

        </div>
    </div>



@endsection
