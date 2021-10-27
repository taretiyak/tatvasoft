@include('header')

<form class="row g-3 m-auto w-50" method="post">
@if(session()->has('error'))
<div class="alert alert-danger">
<strong>{{ session('error')}}</strong>
</div>
@endif
@if(count($errors->all()))
    @foreach($errors->all() as $message)
    <div class="alert alert-danger">
    <strong>{{ $message }}</strong>
    </div>
    @endforeach
@endif
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputEmail4" name="name">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
  </div>
  <div class="col-md-12">
    <label for="inputCPassword4" class="form-label">C Password</label>
    <input type="password" class="form-control" id="inputCPassword4" name="cpassword">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
@include('footer')