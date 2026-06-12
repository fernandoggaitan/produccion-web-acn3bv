<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskItem extends Component
{

    public Task $task;
    public string $title;
    public bool $completed;

    public function change():void
    {

        //Toggle.
        $this->completed = !($this->completed);

        $this->task->update([
            'completed' => $this->completed
        ]);

    }

    public function update()
    {
        $this->task->update([
            'title' => $this->title
        ]);
    }

    public function delete()
    {
        $msj = "Se eliminó la tarea con el título: {$this->title}";
        $this->task->delete();
        //Emitimos mensaje a componente TasksList.
        $this->dispatch('task-deleted', $msj);
    }

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->completed = $task->completed;
    }

    public function render()
    {
        return view('livewire.task-item');
    }

}
