
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $count }} records identified</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table width="100%">
                            <tr class="heading">
                                <td>Name </td>
                                <td>Height </td>
                                <td>Hair Colour </td>
                                <td>Eye Colour </td>
                                <td>Skin Colour </td>
                                <td>Birth Year </td>
                                <td>Gender </td>
                            </tr>
                       @foreach ($results as $result)
                       <tr>
                           <td>{{ $result['name']  }}</td>
                           <td>{{$result['height']}}</td> 
                           <td>{{ $result['hair_color']  }}</td>
                           <td>{{$result['eye_color']}}</td> 
                           <td>{{ $result['skin_color']  }}</td>
                           <td>{{$result['birth_year']}}</td> 
                           <td>{{$result['gender']}}</td> 
                       </tr>    
                    @endforeach                
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection