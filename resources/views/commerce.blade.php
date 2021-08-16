@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
                @endif

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3><strong>Commerce Department ({{ $students->count() }})</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($students->count()>0)
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Student Name</th>
                                <th>Department</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->department }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->contact }}</td>
                                <td> <img src="{{ asset('storage/image/'. $student->image) }}" alt="" height="60"
                                        width="60"></td>
                                <td>
                                    <a href="{{ route('student.show', $student->id) }}"
                                        class="btn btn-success btn-sm">Details</a>


                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('student.edit', $student->id) }}">Edit</a>

                                    <button class="btn btn-danger btn-sm" type="button"
                                        onclick="deleteStudent({{ $student->id }})">
                                        Delete
                                    </button>

                                    <form id="delete-form-{{ $student->id }}"
                                        action="{{ route('student.destroy',$student->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>

                    @else
                    <h2 class="bg-primary text-white text-center p-2">No Students Found</h2>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


@section('js')
<script>
    setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 6000);
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    function deleteStudent(id){
     const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
          confirmButton: 'btn btn-success m-1',
          cancelButton: 'btn btn-danger m-1'
          },
          buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
          title: 'Are you sure to delete student?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
              
              event.preventDefault();
              document.getElementById('delete-form-'+id).submit();
      
          } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
          ) {
          swalWithBootstrapButtons.fire(
              'Cancelled',
          )
          }
      })
 }
</script>

@endsection