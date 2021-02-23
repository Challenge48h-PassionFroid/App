@extends('layout')

@section('content')

<div class="loginIMG">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-6">
      <div class="col-md-12 centrerVertical">
        <form class="form " method="post" action="/login-to-strapi">
          {{ csrf_field() }}
          <h1 class="text-center text-primary">Connexion</h1><br>
          @if($errors->any())
          <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
          </div>
          @endif
          <input type="text" name="email" placeholder="Email" class="form-control my-3">
          <input type="password" name="password" placeholder="Password" class="form-control my-3">
          <br><button type="submit" name="submit" class="btn btn-primary btn-md centrerHoriz">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection