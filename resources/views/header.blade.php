<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        .card{
            margin-top:15px;
        }
        .tags{
            border-radius:8px;
            background:blue;
            color:white;
            padding:5px 10px;
        }
    .card-img-top{
        height:150px;
    }
    </style>
    
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Blog Mgmt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if(Session::has('email'))
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/manage">manage</a>
                </li>
            @endif
            @if(!Session::has('email'))
            <li class="nav-item">
                <a class="nav-link" href="/login">login</a>
            </li>
            @endif
            @if(Session::has('email'))
            <li class="nav-item">
                <a class="nav-link" href="/signout">logout</a>
            </li>
            @endif
            @if(!Session::has('email'))
            <li class="nav-item">
                <a class="nav-link" href="/signup">signup</a>
            </li>
            @endif
        </ul>
        </div>
    </div>
    </nav>
</header>
<main>
    
