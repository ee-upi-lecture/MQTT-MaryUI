<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-modal wire:model="showCreateFaculty" title="Create  Faculty" subtitle="Admin dashboard" separator>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-2/4 sm:flex-none xl:mb-0 xl:w-2/4 text-left">
                <x-input wire:model="code" label="Code" icon="o-at-symbol" placeholder="Please entry the node code"/>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-4/4 sm:flex-none xl:mb-0 xl:w-4/4 text-left">
                <x-input  wire:model="name"  label="Faculty name" icon="o-at-symbol" placeholder="Please entry the node name"/>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-2/4 sm:flex-none xl:mb-0 xl:w-2/4 text-left">
            <x-button  wire:click="save" label="Save faculty"/>
            </div>
        </div>
    </x-modal>
</div>
