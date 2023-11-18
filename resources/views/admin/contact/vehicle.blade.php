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
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Date From</th>
                    <th>Date To</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->location}}</td>
                        <td>
                            {{Carbon\carbon::parse($item->departure_date)->format('d/M/Y')}}
                        </td>
                        <td>
                            {{Carbon\carbon::parse($item->departure_to)->format('d/M/Y')}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection
