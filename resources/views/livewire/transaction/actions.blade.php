<div>
    <div class="grid grid-cols-2 gap-6">
        <div class="card m-3 bg-white card-divider">
            <div class="card-body ">
                <input type="search" class="input input-bordered" placeholder="Search menu" wire:model.live="search">
            </div>
            <div>
                {{-- @php
                    dd($menus);
                @endphp --}}
                @foreach ($menus as $type => $menu)
                    <div class="card p-2">
                        @if ($menu->isEmpty())
                            <div class="card">
                                <span class="text-red-400">empty!</span>
                            </div>
                        @else
                            <h3 class="text-2xl font-bold capitalize">{{ $type }}</h3>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach ($menu as $item)
                                    <button wire:click="addItemMenu({{ $item->id }})" class="avatar">
                                        <div class=" w-full rounded-md">
                                            <img src="{{ $item->images }}" alt="{{ $item->images }}">
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card m-3 bg-slate-200">
            <form wire:submit="saveMenu">
                <div class="card-body space-y-4">
                    <h3 class="card-title">Detail Transaction</h3>
                    {{-- @json($items) --}}
                    <div @class([
                        'table-wrapper' . 'border-error' => $errors->first('form.items'),
                    ])>
                        <table class="table">
                            <thead>
                                <th>Name Menu</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $val)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $val['qty'] }}</td>
                                        <td>{{ Number::format($val['price']) }}</td>
                                        <td>
                                            <button class="btn btn-xs"
                                                wire:click="removeItemMenu(`{{ $key }}`)">-</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'input-error' => $errors->first('form.customer_id'),
                    ]) wire:model="form.customer_id">
                        <option value="">Choose Customers</option>
                        @foreach ($customers as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <textarea @class([
                        'textarea textarea-bordered',
                        'input-error' => $errors->first('form.desc'),
                    ]) placeholder="Makan ditempat/Bungkus" wire:model="form.desc" cols="30"
                        rows="3"></textarea>
                    <div class="card-actions justify-between">
                        <div class="flex flex-col">
                            {{-- @json($this->getTotalPrice()) --}}
                            <div class="text-xs">Total Price</div>
                            <div @class(['card-title', 'text-error' => $errors->first('form.items')])>Rp. {{ Number::format($this->getTotalPrice()) }}</div>
                        </div>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
