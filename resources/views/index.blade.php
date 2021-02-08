<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="card border border-gray mx-auto w-50 mt-10">
        <div class="card-header" style="background:gray; color: #fff">
            <p class="text-center">Task list</p>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header" style="background:gray;color:#fff">
                    <p class="text-center">New task</p>
                </div>
                <div class="card-body">
                    <form action="/tasks" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="task" class="font-weight-bold">Task</label>
                            <input type="text" class="form-control" id="task" name="task">
                        </div>
                        <button type="submit" class="btn btn-primary">Add task</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header" style="background:gray;color:#fff">
                    <p class="text-center">Current Tasks</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($tasks as $task)
                    <li class="list-group-item">
                        <form action="/task/{{$task['id']}}" method="POST">
                            @csrf
                            <div class="d-inline-block w-75 ml-4">
                                <p class="text-left">{{$task['name']}}</p>
                            </div>
                            <div class="d-inline-block">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
