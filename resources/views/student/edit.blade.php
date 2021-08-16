@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header">
                    <h3 class="card-title float-left"><strong>Update Student</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="student_name">Student Name: </label>
                            <input type="text" class="form-control" placeholder="Enter student name" id="student_name"
                                name="student_name" value="{{ old('student_name', $student->student_name) }}">
                        </div>

                        <div class="form-group">
                            <label for="father_name">Father Name: </label>
                            <input type="text" class="form-control" placeholder="Father name" id="father_name" name="father_name"
                                value="{{ old('father_name',$student->father_name) }}">
                        </div>


                        <div class="form-group">
                            <label for="mother_name">Mother Name: </label>
                            <input type="text" class="form-control" placeholder="Mother name" id="mother_name" name="mother_name"
                                value="{{ old('mother_name', $student->mother_name) }}">
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact: </label>
                            <input type="text" class="form-control" placeholder="Contact" id="contact" name="contact"
                                value="{{ old('contact', $student->contact) }}">
                        </div>

                        <div class="form-group">
                            <label for="age">Student Age: </label>
                            <input type="text" class="form-control" placeholder="age" id="age" name="age"
                                value="{{ old('age', $student->age) }}">
                        </div>


                        <div class="form-group">
                            <label>Gender: </label><br>
                            <input type="radio" name="gender" value="Male" {{ old('gender', $student->gender) ==  'Male' ? 'checked' : ''}}> Male<br>
                            <input type="radio" name="gender" value="Female" {{ old('gender', $student->gender) ==  'Female' ? 'checked' : ''}}> Female<br>
                        </div>

                       

                       

                        <div class="form-group">
                            <label>Choose Department</label>
                            <select class="form-control" name="department">
                                <option value="">Select Any</option>
                                <option value="Science" {{ old('department',$student->department) ==  'Science' ? 'selected' : ''}}>Science</option>
                                <option value="Arts" {{ old('department',$student->department) ==  'Arts' ? 'selected' : ''}}>Arts</option>
                                <option value="Commerce" {{ old('department',$student->department) ==  'Commerce' ? 'selected' : ''}}>Commerce</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                        </div>


                       

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('student.index') }}" class="btn btn-danger wave-effect">Back</a>
                        </div>

                    </form>


                </div>

                <!-- /.card-body -->
            </div>
        </div>

    </div>
</div>
@endsection


@section('css')

@endsection