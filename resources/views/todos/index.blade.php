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
                font-size: 84px;
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

    

            <div class="content">
                <div class="title m-b-md">
                    <a href="/">Todos</a>
                </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-5 offset-md-0">
            <div class="container">
                @foreach($todos as $todo)
                    <ul>
                        <li class='list-group-item'>
                            {{ $todo->name }} 
                            <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right">Delete</a>
                            <a href="/todos/{{ $todo->id }}/edit"class="btn btn-warning btn-sm float-right">edit</a>
                            <a href="/todos/{{ $todo->id }}"><button class="btn btn-primary btn-sm float-right">View </button></a>
                            @if(!$todo->completed)
                            <a href="/todos/{{ $todo->id }}/completed" style="border:1px solid red" class="btn btn-default btn-sm float-right"> Complete </a>
                            @endif
                        </li>
                    </ul>
                @endforeach
            </div>
            </div>
            </div>
        </div>
  
@endsection
        
