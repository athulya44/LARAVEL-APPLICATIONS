<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($message=Session::get('error'))
    <div class="alert-alert-danger">
        <strong>{{$message}}</strong>
    </div>
    @endif
    @if(count($errors)>0)
    <div class="alert-alert-danger">
        <ul>hh
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post">
    {{csrf_field()}}
    @if(isset(Auth::user()->email))
  <div class="alert alert-danger success-block">
    <strong>welcome::{{Auth::user()->email))</strong>
  </div>
    @else
<h2>errors have formed</h2>
    @endif
</body>
</html>