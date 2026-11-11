    <ul class="list-group mt-8">
        @foreach($tasks as $task)
        <li class="list-group-item w-75 mx-auto">
            <div class="form-control space-4" style="display: flex; align-items: center; justify-content: space-between;">
                
                <label class="form-check-label mr-4">{{ $task['task'] }} </label>
                <div style="display: inline;" class="">                
                    <form style="display: inline" action="{{ route('delete_task') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="form-check-input border-danger" name="id" type="hidden" name="id" value="{{ $task->id }}">
                        <button class="btn btn-outline-secondary" id="button-addon2-1">Delete</button>
                    </form>

                    <form style="display: inline" action="{{ route('refine_task') }}" method="POST">
                        @csrf
                        <input class="form-check-input border-info" name="id" type="hidden" name="id" value="{{ $task->id }}">
                        <button class="btn btn-outline-secondary" id="button-addon2-1">Edit</button>
                    </form>

                </div>
        </div>
        </li>
        @endforeach
    </ul>