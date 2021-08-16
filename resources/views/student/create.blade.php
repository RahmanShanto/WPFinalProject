@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title float-left"><strong>Add New Student</strong></h3>

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
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="student_name">Student Name: </label>
                            <input type="text" class="form-control" placeholder="Enter student name" id="student_name"
                                name="student_name" value="{{ old('student_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="father_name">Father Name: </label>
                            <input type="text" class="form-control" placeholder="Father name" id="father_name" name="father_name"
                                value="{{ old('father_name') }}">
                        </div>


                        <div class="form-group">
                            <label for="mother_name">Mother Name: </label>
                            <input type="text" class="form-control" placeholder="Mother name" id="mother_name" name="mother_name"
                                value="{{ old('mother_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact: </label>
                            <input type="text" class="form-control" placeholder="Contact" id="contact" name="contact"
                                value="{{ old('contact') }}">
                        </div>

                        <div class="form-group">
                            <label for="age">Student Age: </label>
                            <input type="text" class="form-control" placeholder="age" id="age" name="age"
                                value="{{ old('age') }}">
                        </div>


                        <div class="form-group">
                            <label>Gender: </label><br>
                            <input type="radio" name="gender" value="Male" {{ old('gender') ==  'Male' ? 'checked' : ''}}> Male<br>
                            <input type="radio" name="gender" value="Female" {{ old('gender') ==  'Female' ? 'checked' : ''}}> Female<br>
                        </div>

                       

                       

                        <div class="form-group">
                            <label>Choose Department</label>
                            <select class="form-control" name="department">
                                <option value="">Select Any</option>
                                <option value="Science" {{ old('department') ==  'Science' ? 'selected' : ''}}>Science</option>
                                <option value="Arts" {{ old('department') ==  'Arts' ? 'selected' : ''}}>Arts</option>
                                <option value="Commerce" {{ old('department') ==  'Commerce' ? 'selected' : ''}}>Commerce</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                        </div>


                       

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add</button>
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