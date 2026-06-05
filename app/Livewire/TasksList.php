<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TasksList extends Component
{

    public string $title = '';
    public string $search = '';
    public int $renderizados = 0;

    public function add():void
    {
        $task = Task::create([
            'title' => $this->title
        ]);
        $this->title = '';
    }

    public function change(Task $task):void
    {

        //Toggle.
        $completed = !$task->completed;

        $task->update([
            'completed' => $completed
        ]);

    }

    public function render()
    {
        $this->renderizados++;
        $tasks = Task::select( ['id', 'title', 'completed'] )
            ->when($this->search, fn(Builder $query) =>
                $query->where('title', 'like', "%{$this->search}%")
            )
            ->get();
        return view('livewire.tasks-list', [
            'tasks' => $tasks
        ]);
    }

}
