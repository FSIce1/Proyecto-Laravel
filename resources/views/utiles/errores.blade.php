
@if ($errors->any())
    
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="fal fa-times"></i>
            </span>
        </button>
        <div class="d-flex flex-start w-100">
            <div class="mr-2 d-sm-none d-md-block">
                <span class="icon-stack icon-stack-lg">
                    <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                    <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                    <i class="fal fa-info icon-stack-1x opacity-100 color-white"></i>
                </span>
            </div>

            <div class="d-flex flex-fill">
                <div class="flex-fill">
                    <span class="h5">Información</span>
                    <br/><br/>
                    <ol>
                        @foreach ($errors -> all() as $error)
                            <li><p>{{$error}}</p></li>
                        @endforeach
                    </ol>

                </div>
            </div>

        </div>
    </div>

@endif