<div>
    @if($addNodeState == false)
        <div class="text-left">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mb-6 sm:w-4/4 sm:flex-none xl:mb-0 xl:w-4/4 text-right">
                    <x-button wire:click="addNode" icon="o-plus-circle" label="Add node" class="btn-outline btn-success btn-sm"/>
                </div>
            </div>
        </div>
    @else
        <div class="text-left">
            <h1>
                <b>Add Node</b>
            </h1>
            <br/>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mb-6 sm:w-4/4 sm:flex-none xl:mb-0 xl:w-4/4 text-right">
                    <x-button wire:click="addNode" icon="o-x-mark" class="btn-outline btn-circle btn-error btn-xs"/>
                </div>
            </div>
            <br/>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mb-6 sm:w-3/4 sm:flex-none xl:mb-0 xl:w-3/4 text-left">
                    <x-choices-offline
                        label="Faculty"
                        wire:model.live="faculty_searchable_offline_id"
                        :options="$faculties"
                        placeholder="Search faculty..."
                        single
                        searchable>
                        <x-slot:append>
                            {{-- Add `rounded-s-none` class (RTL support) --}}
                            <x-button wire:click="$dispatch('AdminFacultyCreate_showModal')" label="Add faculty" icon="o-check" class="btn-primary rounded-s-none" />
                        </x-slot:append>
                    </x-choices-offline>
                    <livewire:admin.faculty.create/>
                </div>
            </div>
            @if(!is_null($faculty_searchable_offline_id))
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 mb-6 sm:w-3/4 sm:flex-none xl:mb-0 xl:w-3/4 text-left">
                        <x-choices-offline
                            label="Building"
                            wire:model.live="building_searchable_offline_id"
                            :options="$buildings"
                            placeholder="Search building..."
                            single
                            searchable>
                            <x-slot:append>
                                {{-- Add `rounded-s-none` class (RTL support) --}}
                                <x-button wire:click="$dispatch('AdminBuildingCreate_showModal')" label="Add room" icon="o-check" class="btn-primary rounded-s-none" />
                            </x-slot:append>
                        </x-choices-offline>
                        <livewire:admin.building.create/>
                    </div>
                </div>
            @endif
            @if(!is_null($building_searchable_offline_id))
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 mb-6 sm:w-3/4 sm:flex-none xl:mb-0 xl:w-3/4 text-left">
                        <x-choices-offline
                            label="Room"
                            wire:model="room_searchable_offline_id"
                            :options="$rooms"
                            placeholder="Search room..."
                            single
                            searchable>
                            <x-slot:append>
                                {{-- Add `rounded-s-none` class (RTL support) --}}
                                <x-button wire:click="$dispatch('AdminRoomCreate_showModal')" label="Add building" icon="o-check" class="btn-primary rounded-s-none" />
                            </x-slot:append>
                        </x-choices-offline>
                        <livewire:admin.room.create/>
                    </div>
                </div>
            @endif
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/4 sm:flex-none xl:mb-0 xl:w-1/4 text-left">
                    <x-input wire:model="code" label="Code" icon="o-at-symbol" placeholder="Please entry the node code"/>
                </div>
                <div class="w-full max-w-full px-3 mb-6 sm:w-2/4 sm:flex-none xl:mb-0 xl:w-2/4 text-left">
                    <x-input  wire:model="name"  label="Node name" icon="o-at-symbol" placeholder="Please entry the node name"/>
                </div>
            </div>
            <br/>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/4 sm:flex-none xl:mb-0 xl:w-1/4 text-left">
                    <x-button wire:click="saveNode" label="Save" icon="o-bookmark" class="btn-outline btn-sm btn-success"/>
                </div>
            </div>
        </div>
    @endif
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
