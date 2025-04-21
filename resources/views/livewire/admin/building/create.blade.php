<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-modal wire:model="showCreateBuildingModal" title="Create  Building" subtitle="Admin dashboard" separator>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-4/4 sm:flex-none xl:mb-0 xl:w-4/4 text-left">
                <x-choices-offline
                    label="Faculty"
                    wire:model.live="faculty_searchable_offline_id"
                    :options="$faculties"
                    placeholder="Search faculty..."
                    single
                    searchable>
                </x-choices-offline>
                <livewire:admin.faculty.create/>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-2/4 sm:flex-none xl:mb-0 xl:w-2/4 text-left">
                <x-input wire:model="code" label="Code" icon="o-at-symbol" placeholder="Please entry the node code"/>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-4/4 sm:flex-none xl:mb-0 xl:w-4/4 text-left">
                <x-input  wire:model="name"  label="Building name" icon="o-at-symbol" placeholder="Please entry the node name"/>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-2/4 sm:flex-none xl:mb-0 xl:w-2/4 text-left">
                <x-button  wire:click="save" label="Save building"/>
            </div>
        </div>
    </x-modal>
</div>
