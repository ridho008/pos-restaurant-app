<div>
    <div class="grid grid-cols-2 gap-6">
        <div class="card m-3 bg-white card-divider">
            <div class="card-body ">
                <input type="search" class="input input-bordered" placeholder="Search menu" wire:model="search">
            </div>
            <div>
                @foreach ($menus as $type => $menu)
                    <div class="card p-2">
                        <h3 class="text-2xl font-bold capitalize">{{ $type }}</h3>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach ($menu as $item)
                                <div class="avatar">
                                    <div class=" w-full rounded-md">
                                        <img src="{{ $item->images }}" alt="{{ $item->images }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card m-3 bg-slate-700">
            <div class="card-body">
                <h4>Form</h4>
            </div>
        </div>
    </div>
</div>
