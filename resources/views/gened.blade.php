@extends('layout')
@section('title','Gen Ed Books')
@section('content')
        <table>
            <thead>
                <tr>
                    <th>Accession Number</th>
                    <th>Call Number</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publishing</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gened as $row) 
                <tr>
                    <td>$row -> accesion_no</td>
                    <td>$row -> call_no</td>
                    <td>$row -> title</td>
                    <td>$row -> author</td>
                    <td>$row -> publisher</td>
                </tr>

            
            </tbody>
        </table>

@endsection