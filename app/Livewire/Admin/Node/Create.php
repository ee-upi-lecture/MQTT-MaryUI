<?php

namespace App\Livewire\Admin\Node;

use App\Models\Building;
use App\Models\Faculty;
use App\Models\Node;
use App\Models\Room;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;
class Create extends Component
{

    use Toast;
    public ?int $faculty_searchable_offline_id = null;
    public ?int $building_searchable_offline_id = null;#
    public ?int $room_searchable_offline_id = null;

    public $buldingsSearchable = null;
    public $facultiesSearchable = null;
    public $roomsSearchable = null;
    public $addNodeState = false;
    public $code;
    public $name;

    #[On('AdminNodeCreate_refresh')]
    public function render()
    {
        $faculties = Faculty::all();
        $buildings = null;
        $rooms = null;
        if(!is_null($this->faculty_searchable_offline_id)) {
            //dd($this->faculty_searchable_offline_id);
            $this->buildingSearch();
            $buildings = Building::where('faculty_id', $this->faculty_searchable_offline_id)->get();

        }

        if(!is_null($this->building_searchable_offline_id)) {
            $this->roomSearch();
            $rooms = Room::where('building_id', $this->building_searchable_offline_id)->get();
        }
        return view('livewire.admin.node.create', ['faculties' => $faculties, 'buildings' => $buildings,
            'rooms' => $rooms]);
    }

    public function addNode(){
        if($this->addNodeState == true){
            $this->addNodeState = false;
        }else{
            $this->addNodeState = true;
        }
    }

    public function saveNode(){
        //dd('save');

            $this->validate([
                'code' => 'required',
                'name' => 'required',
            ]);

        Node::create([ 'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->toast(
            type: 'success',
            title: 'Node has been saved!',
            description: null,                  // optional (text)
            position: 'toast-top toast-center',   // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );
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
    public function buildingSearch(string $value = '')
    {
        // Besides the search results, you must include on demand selected option
        $selectedOption = Building::where('id', $this->building_searchable_offline_id)->get();

        $this->buldingsSearchable = Building::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($selectedOption);     // <-- Adds selected option
    }
    public function roomSearch(string $value = '')
    {
        // Besides the search results, you must include on demand selected option
        $selectedOption = Room::where('id', $this->room_searchable_offline_id)->get();

        $this->roomsSearchable = Room::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($selectedOption);     // <-- Adds selected option
    }
}
