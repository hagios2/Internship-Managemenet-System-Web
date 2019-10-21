@extends('main_cordinator.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as MainCordinator!


                    <form method='post' action='/main-cordinator/logout'>
                        @csrf

                        <button type='submit'>logout</form> 

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
