<?php

namespace App\Livewire\Admin\Building;

use App\Models\Building;
use App\Models\Faculty;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{

    use Toast;
    public $showCreateBuildingModal = false;
    public ?int $faculty_searchable_offline_id = null;

    public $facultiesSearchable = null;
    public $code = null;
    public $name = null;
    public function render()
    {
        $faculties = Faculty::all();
        return view('livewire.admin.building.create', ['faculties' => $faculties]);
    }

    #[On('AdminBuildingCreate_showModal')]
    public function createBuilding(){
        $this->showCreateBuildingModal = true;
    }

    public function mount(){
        $this->facultySearch();
    }
    public function facultySearch(string $value = '')
    {
        // Besides the search results, you must include on demand selected option
        $selectedOption = Faculty::where('id', $this->faculty_searchable_offline_id)->get();

        $this->facultiesSearchable = Faculty::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($selectedOption);     // <-- Adds selected option
    }

    public function save(){
        $this->validate([
            'faculty_searchable_offline_id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);
        Building::create([
            'code' => $this->code,
            'name' => $this->name,
            'faculty_id' => $this->faculty_searchable_offline_id,
        ]);

        $this->toast(
            type: 'success',
            title: 'Building has been saved!',
            description: null,                  // optional (text)
            position: 'toast-top toast-center',   // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );
        $this->name = null;
        $this->code = null;
        $this->faculty_searchable_offline_id = null;
        $this->dispatch('AdminNodeCreate_refresh');
    }
}
