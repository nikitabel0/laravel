@extends('layout')
@section('content')
    <section>
        <div class="card" style="width: 20rem; display:flex; margin-left: auto; margin-right:auto">
            <div class="card-header">
                Нас можно найти по адресу ниже
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Город: {{$data['city']}}</li>
                <li class="list-group-item">Улица: {{$data['street']}}</li>
                <li class="list-group-item">Строение: {{$data['house']}}</li>
            </ul>
        </div>
    </section>
@endsection