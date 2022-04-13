
    <br/>
            @if(Session::has('SuccessMessage'))

                <div class="row">

                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                       <div class="alert alert-success text-center" role="alert">
                            <strong>Info : </strong> {{Session::get('SuccessMessage')}}
                       </div>

                    </div>
                </div>

            @endif

            @if(Session::has('ErrorMessage'))

                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-danger text-center">
                            <strong>Info : </strong> {{Session::get('ErrorMessage')}}
                        </div>

                    </div>
                </div>

            @endif



