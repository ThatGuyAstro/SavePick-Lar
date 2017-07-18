@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Session</div>

                <div class="panel-body">

                    <form action="{{ route('api.acceptMatch') }}" method="post">

                      {{ csrf_field() }}

                      <input type="textfield" name="session-id" placeholder="Session ID">
                      <br>
                      <br>
                      <input type="textfield" name="session-password" placeholder="Session Password">


                      <br>
                      <br>


                      <input type="submit" name="submit">


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
