@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Pago</h2>

    <form action="{{ route('pays.update', $pay->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="date">Fecha de pago:</label>
            <input type="date" name="date" id="date" class="form-control"
                   value="{{$pay->date}}" required>
        </div>

        <div class="form-group mb-3">
            <label for="value">Valor del pago:</label>
            <input type="number" name="value" id="value" class="form-control"
                   value="{{$pay->value}}" step="0.01" min="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Actualizar pago</button>
        <a href="{{route('pays.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    let dateInput = document.getElementById("date");
    let valueInput = document.getElementById("value");
    let btn = document.getElementById("submitBtn");

    function validate() {
        let today = new Date().toISOString().split("T")[0];
        let dateValid = dateInput.value && dateInput.value <= today;
        let valueValid = parseFloat(valueInput.value) > 0;
        btn.disabled = !(dateValid && valueValid);
    }

    dateInput.addEventListener("input", validate);
    valueInput.addEventListener("input", validate);

    validate();
});
</script>
@endsection
