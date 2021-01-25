@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edycja Najemcy
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('renters.update', $renter->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nazwisko i Imię </label>
              <input type="text" class="form-control" name="name" value="{{ $renter->name }}"/>
          </div>
          <div class="form-group">
              <label for="address">Adres</label>
              <input type="text" class="form-control" name="address" value="{{ $renter->address }}"/>
          </div>
          <div class="form-group">
              <label for="PESEL">PESEL</label>
              <input type="text" class="form-control" name="PESEL" value="{{ $renter->PESEL }}"/>
          </div>
          <div class="form-group">
              <label for="id_card">Nr Dowodu</label>
              <input type="text" class="form-control" name="id_card" value="{{ $renter->id_card }}"/>
          </div>
          <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="text" class="form-control" name="phone" value="{{ $renter->phone }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ $renter->email }}"/>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Zmień Najemcę</button>
      </form>
  </div>
</div>
@endsection