<div>
    <x-slot name="header">Versions</x-slot>
    <x-aaran-ui::forms.m-panel>
        <x-aaran-ui::alerts.notification />

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-aaran-ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-aaran-ui::table.caption :caption="'Versions'">
            {{$list->count()}}
        </x-aaran-ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-aaran-ui::table.form>
            <x-slot:table_header>
                <x-aaran-ui::table.header-serial/>
                <x-aaran-ui::table.header-text  wire:click.prevent="sortBy('id')"  sortIcon="{{$sortAsc}}" >
                    Software Version
                </x-aaran-ui::table.header-text>
                <x-aaran-ui::table.header-text > Database Version</x-aaran-ui::table.header-text>
                <x-aaran-ui::table.header-text > Title</x-aaran-ui::table.header-text>
                <x-aaran-ui::table.header-text > Body</x-aaran-ui::table.header-text>

                <x-aaran-ui::table.header-serial/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)

                    <x-aaran-ui::table.row >
                        <x-aaran-ui::table.cell-text>{{$index+1}}</x-aaran-ui::table.cell-text>
                        <x-aaran-ui::table.cell-text >{{$row->soft_version}}</x-aaran-ui::table.cell-text>
                        <x-aaran-ui::table.cell-text >{{$row->db_version}}</x-aaran-ui::table.cell-text>
                        <x-aaran-ui::table.cell-text >{{$row->title}}</x-aaran-ui::table.cell-text>
                        <x-aaran-ui::table.cell-text class="line-clamp-1" >{{$row->body}}</x-aaran-ui::table.cell-text>
                        <x-aaran-ui::table.cell-action id="{{$row->id}}"/>
                    </x-aaran-ui::table.row>

                @endforeach
            </x-slot:table_body>
        </x-aaran-ui::table.form>

        <!-- Delete Modal --------------------------------------------------------------------------------------------->
        <x-aaran-ui::modal.delete/>

        <div class="pt-5">{{ $list->links() }}</div>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->
        <x-aaran-ui::forms.create :id="$vid">

            <x-aaran-ui::input.floating wire:model="soft_version" label="Software Version" />
            <x-aaran-ui::input.floating wire:model="db_version" label="Database Version" />
            <x-aaran-ui::input.floating wire:model="title" label="Title" />
            <x-aaran-ui::input.floating wire:model="body" label="Description" />
            <x-aaran-ui::input.error-text wire:model="soft_version"/>

        </x-aaran-ui::forms.create>

    </x-aaran-ui::forms.m-panel>
</div>


