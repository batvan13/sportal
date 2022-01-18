@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    Update entity
                    <form method="post" action="{{ route('entity.update',[$entity->id]) }}">
                        {{method_field('PATCH')}}
                        @csrf

                        <input type="hidden" name="user_id" value="{{Auth::id()}}">

                        <div class="form-group col">
                            <label for="title"><span style="color:red">*</span>заглавие</label>
                            <input type="text" class="form-control form-control-sm" name="title" id="title"
                                class="@error('name_bg') is-invalid @enderror" value="{{ old('title',$entity->title) }}" />

                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="description_short"><span style="color:red">*</span>кратко описание</label>
                            <input type="text" class="form-control form-control-sm" name="description_short" id="description_short"
                                class="@error('description_short') is-invalid @enderror" value="{{ old('description_short',$entity->description_short) }}" />

                            @error('description_short')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="description">статия</label>
                            <textarea class="form-control form-control-sm" name="description" id="description" rows="10"
                                class="@error('description') is-invalid @enderror" >
                                {{ old('description',$entity->description) }}
                             </textarea>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">update</button>

                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

