@extends('layouts.app')

@section('content')

<h1>show </h1>
<div class="container">

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $entity->title }}</h5>
          <p class="card-text">{{ $entity->description }}</p>

          <a href="{{ route('entity.index') }}" class="btn btn-primary">Go back</a>

        </div>
      </div>
</div>

@endsection
