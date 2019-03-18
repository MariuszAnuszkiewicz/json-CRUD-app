@extends('layouts.app')

@section('edit_content')
    <table class="edit_table">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Marka</th>
          <th scope="col">Model</th>
          <th scope="col">Silnik</th>
          <th scope="col">Dostępność</th>
          <th scope="col">Zdjęcie</th>
        </tr>
        </thead>
        <tbody style="text-align: center;">
        <tr>
          <td><p class="edit">{{ $car->make }}</p></td>
          <td><p class="edit">{{ $car->model }}</p></td>
          <td><p class="edit">{{ $car->engine }}</p></td>
          <td class="edit_available">
          <form action="{{ route('offers.update', $car->id) }}" method="POST" name="update">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="row">
              <div class="form-group">
                <input type="text" name="availability" class="input-form" value="{{ $car->availability }}">
              </div>
              <div class="col-md-3">
                @if($car->availability == 'tak')
                   <select class="form-control" name="available">
                     <option value="tak" selected="selected">tak</option>
                     <option value="nie">nie</option>
                   </select>
                @else
                   <select class="form-control" name="available">
                     <option value="tak">tak</option>
                     <option value="nie" selected="selected">nie</option>
                   </select>
                @endif
              </div>
                <button type="submit" id="edit_btn" class="btn btn-primary">zatwierdź</button>
            </div>
          </form>
          </td>
          <td><img src="{{ $car->photo }}"></td>
        </tr>
        </tbody>
    </table>
@endsection
