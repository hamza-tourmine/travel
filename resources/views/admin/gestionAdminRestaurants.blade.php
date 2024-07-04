@extends('admin.layout')
@section('title')
<h2>La gestion des admins des restaurants</h2>
@endsection
@section('content')
<form action="{{route('adminRestaurants.store')}}" method="post" accept-charset="utf-8">
    @csrf
    <label style="color: #004B57;">Restaurant </label>
    <div class="input">
        <select name="restaurant" id="" style="width: 100%;">
            <option disabled>Choisir Restaurants</option>
            @forelse($restaurants as $restaurant)
            <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
            @empty
            <option style="background-color: red;color:white">Aucun restaurant n'a été ajouté pour le moment.</option>
            @endforelse
        </select>
    </div>
    <label style="color: #004B57;">Nom</label>
    <div class="input">

        <input type="text" name="nom" style="color: black;"  placeholder="Nom *" required>
    </div>

    <label style="color: #004B57;">Prenom</label>
    <div class="input">
        </span>
        <input type="text" name="prenom" style="color: black;" placeholder="Prenom *" required>
    </div>

    <label style="color: #004B57;">Email</label>
    <div class="input">
        <input type="email" name="email" style="color: black;" placeholder="email *" required />

    </div>

    
    <label style="color:#004B57">Genre</label>

    <select class="input" name="genre" style="width: 95%;">
        <option value="" disabled selected>Genre</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>
    <label style="color: #004B57;">Telephone</label>
    <div class="input">
        <input type="tel" name="telephone" style="color: black;" placeholder="telephone *">

    </div>
    <label style="color: #004B57;">password</label>
    <div class="input">
        <input type="password" name="password" style="color: black;" placeholder="password *">

    </div>
    <div style="margin-bottom: 7px;">
        <input type="submit" value="Ajouter" style="color:#004B57;border:2px solid #004B57" />
    </div>
</form>
<div class="container">

    <table>
        <thead >
            <tr >
                <th style="background-color:#004B57">Nom</th>
                <th style="background-color:#004B57">Prenom</th>
                <th style="background-color:#004B57">Email</th>
                <th style="background-color:#004B57">Genre</th>
                <th style="background-color:#004B57">Telephone</th>
                <th style="background-color:#004B57">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->nom }}</td>
                <td>{{ $admin->prenom }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->genre }}</td>
                <td>{{ $admin->telephone }}</td>
                <td>
                <form action="{{ route('adminRestaurants.destroy', $admin->id) }}" method="post" id="deleteForm">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur de restaurant?')" style="text-decoration: none; padding:5px;background-color:#004B57;color:white;font-weight:bold;border-radius:5px;border-color:#004B57">Supprimer</button>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    


</div>
@endsection