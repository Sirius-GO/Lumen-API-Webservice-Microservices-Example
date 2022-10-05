@extends('layouts.app')

@section('content')

<main class="container">
<form class="row row-cols-lg-auto g-3 align-items-center" action="http://localhost:8000/api/users/add" method="POST">

<div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupName">Name</label>
    <div class="input-group">
      <div class="input-group-text">Name</div>
      <input type="text" class="form-control" name="name" id="inlineFormInputGroupName" placeholder="Name">
    </div>
  </div>

  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupEmail">Email</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" class="form-control" name="email" id="inlineFormInputGroupEmail" placeholder="Email">
    </div>
  </div>

  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupPassword">Password</label>
    <div class="input-group">
      <div class="input-group-text">...</div>
      <input type="password" class="form-control" name="password" id="inlineFormInputGroupPassword" placeholder="Password">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign Up</button>
  </div>
</form>
<br>

  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>

@if(count($decodedAuthors)>0)

  <div class="row mb-2">
 @foreach($decodedAuthors as $da)   
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
  
      <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">{{$da['location']}}</strong>
          <h3 class="mb-0">{{$da['name']}}</h3>
          <div class="mb-1 text-muted">{{ Carbon\Carbon::parse($da['created_at'])->diffForHumans() }}</div>
          <p class="card-text mb-auto">{{$da['latest_article_published']}}</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

        </div>      
        </div>
        </div>
    @endforeach
</div>


@endif


</main>

@endsection

