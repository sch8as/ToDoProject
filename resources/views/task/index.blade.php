@extends('layouts.app')

@section('content')
    @if(count($tasks))
        <table class="table table-striped ">

            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="fit" scope="row">
                            {{$task->title}}
                        </td>
                        <td class="fit" scope="row">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Delete
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" title="Delete">Confirm</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>There has no tasks</h4>
    @endif

    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('tasks.store')}}">
        @csrf
        <div class="row">
            <div class="col">
                <input type="text" id="title" name="title" required="" class="form-control mb-3" >
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Add</button>
            </div>
        </div>
    </form>
@endsection

@section('styles')
    <style>
        .fit{
            white-space: nowrap;
            width: 1%;
        }
    </style>
@endsection