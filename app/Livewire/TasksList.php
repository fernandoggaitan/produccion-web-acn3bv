<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;

class TasksList extends Component
{

    public string $title = '';
    public string $search = '';
    public string $msj = '';

    #[On('task-deleted')]
    public function taskDeleted(string $msj)
    {
        $this->msj = $msj;
    }

    public function add():void
    {
        $task = Task::create([
            'title' => $this->title
        ]);
        $this->title = '';
    }

    public function render()
    {
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
