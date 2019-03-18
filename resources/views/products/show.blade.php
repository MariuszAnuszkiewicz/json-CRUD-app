@extends('layouts.app')

@section('content')
<table class="table">
 @if (count($productes) > 0)
  <thead class="thead-dark">
    <tr>
      <th scope="col">Marka</th>
      <th scope="col">Model</th>
      <th scope="col">Silnik</th>
      <th scope="col">Dostępność</th>
      <th scope="col">Zdjęcie</th>
      <th scope="col">Usuwanie</th>
      <th scope="col">Zmiana dostępności</th>
    </tr>
  </thead>
  @else
    <a href="{{ route('offers_store') }}">Załaduj Dane</a>
  @endif
  <tbody style="text-align: center;">
    @foreach ($productes as $product)
      @if ($product->availability == 'nie')
      <tr class="active">
        <td><p>{{ $product->make }}</p></td>
        <td><p>{{ $product->model }}</p></td>
        <td><p>{{ $product->engine }}</p></td>
        <td><p>{{ $product->availability }}</p></td>
        <td><img src="{{ $product->photo }}"></td>
        <td>
          <form action="{{ route('offers.destroy', $product->id) }}" method="POST">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-danger">usuń</button>
          </form>
        </td>
        <td>
          <a href="{{ route('offers.edit',$product->id)}}" class="btn btn-primary">Dostępność</a></td>
        </td>
      </tr>
      @elseif ($product->availability == 'tak')
      <tr>
        <td><p>{{ $product->make }}</p></td>
        <td><p>{{ $product->model }}</p></td>
        <td><p>{{ $product->engine }}</p></td>
        <td><p>{{ $product->availability }}</p></td>
        <td><img src="{{ $product->photo }}"></td>
        <td>
          <form action="{{ route('offers.destroy', $product->id) }}" method="POST">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-danger">usuń</button>
          </form>
        </td>
        <td>
          <a href="{{ route('offers.edit',$product->id)}}" class="btn btn-primary">Dostępność</a></td>
        </td>
      </tr>
      @endif
    @endforeach
  </tbody>
</table>
@endsection


