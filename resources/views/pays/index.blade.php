@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tus pagos</h2>

    @if($pays->count())
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pays as $pay)
                    <tr>
                        <td>{{$pay->id}}</td>
                        <td>{{ $pay->date }}</td>
                        <td>$ {{ number_format($pay->value, 2) }}</td>
                        <td>
                            <a href="{{route('pays.edit', $pay->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('pays.destroy', $pay->id)}}" method="post" >
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No has realizado pagos aún.</p>
    @endif

    <form action="{{route('pays.store')}}" method="post">
            @csrf
            <label for="date">Ingrese la fecha de pago
                <input type="date" name="date" id="date" value="">
            </label>
            <label for="value">Ingrese el valor del pago
                <input type="number" name="value" id="value" value="">
            </label>
            <button type="submit" class="btn btn-success">Añadir nuevo pago</button>
    </form>

    {{-- Botón para ver menú --}}
    <a href="{{ route('menu') }}" class="btn btn-success mt-3">Conocer menú</a>
</div>
@endsection
