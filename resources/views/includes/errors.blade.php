@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li></i>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


@if(session('success'))

    <div class="alert alert-success">

            <span class="fa fa-exclamation-circle"></span>  {{session('success')}}

    </div>

@endif

@if(session('info'))

    <div class="alert alert-info">

       <span class="fa fa-exclamation-circle"></span> {{session('info')}}

    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger">

        <span class="fa fa-exclamation-circle"></span> {{session('error')}}

    </div>

@endif
