<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [' '];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages =[
        'options.*.required' => 'Option cannot be empty'

    ];
    public function addOption()
    {
        $this->options[] = ' ';
    }
    public function removeOptions($index){
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function createPoll()
    {
        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            array_map(function ($option) {
                return ['name' => $option];
            }, $this->options)
        );
        $this->dispatch('pollCreated');
        $this->reset(['title', 'options']);

    }
    public function render()
    {
        return view('livewire.create-poll');
    }
}
