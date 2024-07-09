@extends('layouts.app')
@section('titles', 'Add Task')

@section('content')
   <form method="POST" action="{{route('tasks.store')}}">

     @csrf
<div>
    <label for="title">
        Title
    </label>
    <input text="text" name="title" id="title" value="{{ old('title') }}"/>
</div>
<div>
    <label for="description"> Description</label>
    <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
</div>
<div>
    <label for="long_description">Long Description</label>
    <textarea name="long_description" id="long_description"  rows="10">{{ old('long_description') }}</textarea>
</div>
<div>
    <button type="submit">Add Task</button>
</div>
   </form>
     
@endsection

