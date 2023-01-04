@extends('layouts.profile')
@section('content')
<body>
  <h1>{{ $profile->id }}</h1>

   <p>{{ $profile->about_me }}</p>
</body>
     
@endsection