@extends('admin.layouts.app')
@section('content')
@php
    define('PAGE','contact')

@endphp
<div class="container">
    <div class="card py-3 px-4">
            <h3>List of People Who want to contact</h3>

        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            @if ($item->message!=null)
                            {{$item->message}}
                            @else 
                            No. of person : {{$item->no_of_person}}
                            <br>
                            Departure Date: {{Carbon\carbon::parse($item->departure_date)->format('d/M/Y')}}

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection
