
<div class="row">

    <div class="card">
        <div class="card-header">Profile</div>

        <div style="justify-content:center; margin:auto;">

            <img src="{{ auth()->user()->avatar }}" style="width:10rem;" class="card-img-top rounded-circle" alt="">

            <div class="card-body">
                <h4 class="card-title">{{ auth()->user()->name }}</h4>
                {{-- <h5 class="card-title">Primary card title</h5> --}}
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
            </div>

        </div>

    </div>

</div>
