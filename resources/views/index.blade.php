@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Nazwisko i Imię </td>
          <td>Adres</td>
          <td>PESEL</td>
          <td>Nr dowodu</td>
          <td class="text-center">Akcja</td>
        </tr>
    </thead>
    <tbody>
        @foreach($renter as $renters)
        <tr>
            <td>{{$renters->id}}</td>
            <td>{{$renters->name}}</td>
            <td>{{$renters->address}}</td>
            <td>{{$renters->PESEL}}</td>
            <td>{{$renters->id_card}}</td>
            <td class="text-center">
                <a href="{{ route('renters.edit', $renters->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('renters.destroy', $renters->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"" type="submit">Usuń</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection