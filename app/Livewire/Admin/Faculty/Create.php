<?php

namespace App\Livewire\Admin\Faculty;

use App\Models\Faculty;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;
    public $showCreateFaculty = false;
    public $name;
    public $code;
    public function render()
    {
        return view('livewire.admin.faculty.create');
    }


    #[On('AdminFacultyCreate_showModal')]
    public function createFaculty(){
        $this->showCreateFaculty = true;
        //dd('faculty create');

    }

    public function save(){
        $this->validate([
            'name' => 'required',
            'code' => 'required',
        ]);
        Faculty::create([
            'name' => $this->name,
            'code' => $this->code,
        ]);
        $this->toast(
            type: 'success',
            title: 'Faculty has been saved!',
            description: null,                  // optional (text)
            position: 'toast-top toast-center',   // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );
        $this->name = null;
        $this->code = null;
        $this->dispatch('AdminNodeCreate_refresh');
    }
}
