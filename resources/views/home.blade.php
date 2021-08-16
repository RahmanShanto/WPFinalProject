@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header"><h2>Welcome To Admin Panel!</h2></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>Name </th>
                            <td>
                                {{ Auth::user()->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Email </th>
                            <td>
                                {{ Auth::user()->email }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        

    </div>
</div>
@endsection


@section('css')
    <style>
        .dept{
            color: white;
        }
    </style>
@endsection