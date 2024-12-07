@extends('layout')
@section('content')
@use('App\Models\User', 'User')
@if(session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
@endif
    <section>
        <p style="text-align:center">Здесь будет выводиться список статей</p>
        <table class="table">
            <thead>
                <tr>
                <th scope='col'>Дата</th>
                <th scope="col">имя</th>
                <th scope="col">Описание</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article) 
                <tr>
                <th class='row'>{{ $article->date }}</th>
                <td><a href="/article/{{ $article->id }}">{{$article->name}}</a></td>
                <td>{{ $article->decs }}</td>
            
                 <td>{{User::findOrFail($article->user_id)->name }}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$articles->links()}}
    </section>
@endsection