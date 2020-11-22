@extends('layouts.app')

@section('content')
<!-- Styles -->
<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <div class="container">
            <div class="content">
                <div class="title m-b-md">
                    Edit Todos
                </div>
        </div>  

            <div class="container col-md-4">
            @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul class="list-group">
                <li class="list-group-item">
                    {{$error}}
                </li>
            </ul>
            @endforeach
            </div>
            @endif
            <form action="/todos/{{ $todo->id }}/update" method="POST" class="">
            @csrf
                <input type="text" name="name" class="form-control" placeholder="name" value="{{$todo->name}}">
                <textarea name="description" class="form-control" placeholder="description" id="" cols="30" rows="10">{{$todo->description}}</textarea>
                <button class="btn btn-success text-center" type="submit" >Update Todo</button>
              </form>
            </div>
@endsection
        
