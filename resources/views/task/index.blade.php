@extends('layouts.default')

@section('content')
    @include('partials.flash')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ToDo</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr class="{{ $task->completed ? 'bg-success' : 'bg-danger' }}">
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->text }}</td>
                <td>{{ $task->completed ? 'Completed' : 'ToDo' }}</td>
                <td>
                    @if ($task->completed)
                        <a class="btn btn-danger" href="/toggle-status/{{$task->id}}">Mark as ToDo</a>
                    @else
                        <a class="btn btn-success" href="/toggle-status/{{$task->id}}">Mark as Completed</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
@stop
