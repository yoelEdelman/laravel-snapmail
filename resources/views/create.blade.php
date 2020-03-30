<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Snap Mail</h1>
        </div>
    </div>

    <div class="container">
        <form class="m-auto" method="post" action="{{route('create.mail')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('email') }}" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Image Url</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"  id="exampleFormControlInput1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea style="height: 200px" class="form-control @error('message') is-invalid @enderror" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Votre message">{{ old('message') }}</textarea>
            </div>
            <div style="text-align: right">
                <button style="width:60px; height: 60px; background-color: #42a4f2; border-radius: 100%" type="submit" class="btn"><img style=" width: 30px" src="{{URL::asset('/images/arrow-58-64.png')}}"></button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 20px">
                    <article>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </article>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" style="margin-top: 20px">
                    <article>
                        <li>{{ session('success') }}</li>
                    </article>
                </div>
            @endif

        </form>
    </div>

<script src="https://use.fontawesome.com/3634e00c80.js"></script>

</body>
</html>
