@extends('layouts.admin')
@section('title', 'All process server assignments')
@section('main-content')

    <!-- Page Heading -->
    <h5 class=" mb-4 text-gray-800">{{ __(ucfirst(request()->segment(1)).' Dashboard >  '.ucfirst(request()->segment(4)).' process server assignments') }}</h5>
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
              <th>Assignment date</th>
              <th>Client Name</th>
              <th>Client Email</th>
              <th>Rush</th>
              <th>Number of Defendants</th>
              <th>Status</th>
              <th>Options</th>
            </tr>

            @foreach($datas as $data)

              <tr>
                <td>{{$data->assignment_title}}</td>
                <td>
                  {{ date('M d, Y', strtotime($data->date_of_assignment)) }}
                </td>                
                
                <td>{{App\User::find($data->client_id)->name}}</td>
                <td>{{App\User::find($data->client_id)->email}}</td>
                <td>{{$data->select_rush}}</td>
                <td>{{$data->number_of_defendants}}</td>
                <td>
                  <?php
                    $abc = new App\Http\Controllers\ContractorController;
                    echo ucfirst($abc->getStatusByNumber($data->status));
                  ?>
                </td>

                <td>

                  <a href="{{route('contractors.assignment.process_server.view.hash', [$data->hash, strtolower($abc->getStatusByNumber($data->status))])}}" class="btn btn-link">View</a> | 

                  <a href="#" class="btn btn-link" style="color: red;">Delete</a>
                </td>
              </tr>

            @endforeach
          </table>

        </div>
    </div>



@endsection
