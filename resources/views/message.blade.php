<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Mail !</title>

</head>
<body>
    <div class="container">
        @if(isset($msg))
            <div class="card" style="width: 18rem; margin: auto">
                <img class="card-img-top" src="{{ $msg->photo_url[0] != 'h' ? URL::asset('/images/'.$msg->photo_url) : $msg->photo_url }}" alt="Card image cap">
                <div class="card-body">
                    <p style="padding: 10px">
                        {{ $msg->message }}
                    </p>
                    <article style="padding: 10px; text-align: right">
                        {{ \Carbon\Carbon::parse($msg->created_at)->diffForHumans() }}

                    </article>
                </div>
            </div>
        @elseif($errorMsg)
            <div style="background: white; width: 50vw; margin: 50px auto; text-align: center; padding: 30px; border-radius: 15px">
                {{ $errorMsg }}
            </div>
        @endif
    </div>

</body>
</html>
