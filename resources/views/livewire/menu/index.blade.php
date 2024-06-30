<div class="mt-3">
    {{-- input search --}}
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="search menus..." wire:model.lazy="search">
        <button class="btn btn-primary" wire:click="$dispatch('createMenu')">
            <span>Add Menu</span>
        </button>
    </div>
    <div>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Menu</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>

                        <td>{{ $loop->iteration }}</td> {{-- loop number for table --}}
                        <td>
                            <div class="flex gap-3 items-center">
                                <div class="avatar">
                                    <div class="w-12 rounded-lg">
                                        {{-- <img src="{{ $menu->pictures }}" alt="{{ $menu->pictures }}"> --}}
                                        <img src="{{ $menu->images }}" alt="{{ $menu->images }}">
                                        {{-- <img src="{{ asset(`uploads/image_uploads/`) }}/ {{ $menu->photo }}"
                                            alt="{{ $menu->photo }}"> --}}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="font-bold">{{ $menu->name }}</div>
                                    <div>{{ $menu->type }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $menu->prices }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>
                            <button class="btn btn-xs  btn-success"
                                wire:click="$dispatch('editMenu', {menu: {{ $menu->id }}})">Edit</button>
                            <button class="btn btn-xs btn-secondary"
                                wire:click="$dispatch('deleteMenu', {menu: {{ $menu->id }}})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @livewire('menu.actions')
    </div>
</div>
