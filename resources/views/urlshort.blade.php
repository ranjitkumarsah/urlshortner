<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL | Shortner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            
        }
    
    </style>
</head>
<body>
    <div class="container mt-3 ">
        <div class="d-flex aligns-items-center justify-content-center mb-3">
            <h4>URL Shortner</h4>
        </div>
        <form method="post" action="{{url('create')}}" accept-charset="UTF-8">
            @csrf
            <div class="row mx-2">
                <div class="form-group col-sm-8 ">
                    <input type="url" name="url" id="url" class="form-control" placeholder="Enter your link for shorten">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                        <!-- <div class="alert alert-danger alert-dismissible fade show mt-1 m-0 p-0">
                           
                            <button type="button" class=" btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> -->
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show m-1 p-1">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-4">
                    <input type="submit" class="btn btn-success " value="Generate" id="save">
                </div>
            </div> 
        </form>
        <div class="row mt-4 mx-3">
            <table class="table table-responsive-sm table-striped table-bordered" id="urlShortTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Your Link</th>
                        <th>Shorten Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($urlShort as $url)
                    <tr>
                        <td>{{$sno++}}</td>
                        <td>{{$url->url}}</td>
                        <td><a target="_blank" href="{{ route('linkShort', ['code' => $url->url_id]) }}">{{ route('linkShort', ['code' => $url->url_id]) }}</a></td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>