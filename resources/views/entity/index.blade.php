@extends('layouts.app')

@section('content')
    <div class="container">
<h1>index</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">title</th>
        <th scope="col">short description</th>
        <th scope="col">created</th>
        <th scope="col">published</th>
        <th scope="col">status</th>
        <th scope="col">view</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
    </tr>
    </thead>
    @foreach ($entity as $item)
         <tbody>
            <tr>
                <th scope="row">{{$item->title}}</th>
                <td>{{$item->description_short}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->published}}</td>

                @if ($item->is_active === 1)
                <td>active</td>
                @else
                <td>no active</td>
                @endif
                @if ( Auth::user())
                <td><a href="{{ route('entity.show',$item->id)}}" class="btn btn-info btn-sm btn-block" >view</a></td>

                <td><a href="{{ route('entity.edit',$item->id)}}" class="btn btn-warning btn-sm btn-block">edit</a></td>

                <td>
                    <form action="{{ route('entity.destroy', $item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn-block" type="submit">delete</button>
                      </form>
                </td>
                @endif
            </tr>
            </tbody>

    @endforeach
</table>
    </div>
@endsection

