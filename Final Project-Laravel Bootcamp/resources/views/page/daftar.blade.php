@extends('layouts.master')
@section('judul')
Buat Account Baru!
@endsection

@section('content')
<form action="/welcome" method="post">
    @csrf
    <label>First Name: </label>
    <br />
    <input type="text" name="Fname" />
    <br /><br />
    <label>Last Name: </label>
    <br />
    <input type="text" name="Lname" />
    <br /><br />
    <label>Gender: </label> 
    <br /><br />
    <input type="radio" name="gender" value="0" /> Male <br />
    <input type="radio" name="gender" value="1" /> Female <br />
    <input type="radio" name="gender" value="2" /> Other
    <br /><br />
    <label>Nationality: </label>
    <br /><br /> 
    <select name="nationality">
        <option value="">Indonesia</option>
        <option value="">English</option>
        <option value="">Other</option>  
    </select>
    <br /><br />   

    <label>Language Spoken: </label>
    <br /><br />
    <input type="checkbox" name="langspoken" value="Bahasa Indonesia">Bahasa Indonesia 
    <br />
    <input type="checkbox" name="langspoken" value="English">English
    <br />
    <input type="checkbox" name="langspoken" value="Bahasa Indonesia">Other
    <br /><br />
    <label>Bio: </label>
    <br /><br /> 
    <textarea name="bio" rows="10" cols="30"></textarea>    
    <br />
    <input type="submit" name="Sign Up" value="Sign Up">
</form>
@endsection