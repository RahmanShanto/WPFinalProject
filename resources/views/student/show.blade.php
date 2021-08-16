@extends('layouts.app')

@section('content')
<div class="container">
    

    <div class="row justify-content-center p-3">
        <div class="col-md-4 text-center">
        <img src="{{  $student->image != null ? asset('storage/image/'. $student->image) : asset('img/default.png') }}" 
        style="height: 200px; width: 170px; margin-top:90px" class="elevation-2" alt="User Image">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3><strong>Student Details</strong></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table">
                            <tr>
                                <th>Student Name</th>
                                <td>{{ $student->student_name }}</td>
                            </tr>
    
                            <tr>
                                <th>Father Name</th>
                                <td>{{ $student->father_name }}</td>
                            </tr>
    
                            <tr>
                                <th>Mother Name</th>
                                <td>{{ $student->mother_name }}</td>
                            </tr>
    
                            <tr>
                                <th>Contact</th>
                                <td>{{ $student->contact }}</td>
                            </tr>
    
                            <tr>
                                <th>Student Age</th>
                                <td>{{ $student->age }}</td>
                            </tr>
    
                            <tr>
                                <th>Department</th>
                                <td>{{ $student->department }}</td>
                            </tr>
    
                            <tr>
                                <th>Gender</th>
                                <td>{{ $student->gender }}</td>
                            </tr>
                        
                        </table>
                      </div>
                </div>
                <div class="card-footer">
                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Back</a>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection