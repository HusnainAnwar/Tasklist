@extends('layouts.app')
@section('titles', 'Add Task')

@section('content')
   <form method="POST" action="{{route('tasks.update', ['id'=>$task->id]) }}">

     @csrf

     @method('PUT')
<div>
    <label for="title">
        Title
    </label>
    <input text="text" name="title" id="title" value="{{$task->title}}"/>
</div>
<div>
    <label for="description"> Description</label>
    <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
</div>
<div>
    <label for="long_description">Long Description</label>
    <textarea name="long_description" id="long_description"  rows="10">{{$task->long_description}}</textarea>
</div>
<div>
    <button type="submit">Edit Task</button>
</div>
   </form>
     
@endsection

