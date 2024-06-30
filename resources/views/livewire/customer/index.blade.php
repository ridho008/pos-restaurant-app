<div class="mt-3">
    {{-- input search --}}
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="search customer..." wire:model.lazy="search">
        <button class="btn btn-primary" wire:click="$dispatch('createCustomer')">
            <span>Add Customer</span>
        </button>
    </div>
    <div>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Fullname</th>
                <th>Contact</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>

                        <td>{{ $loop->iteration }}</td> {{-- loop number for table --}}
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ $customer->desc }}</td>
                        <td>
                            <button class="btn btn-xs  btn-success"
                                wire:click="$dispatch('editCustomer', {customer: {{ $customer->id }}})">Edit</button>
                            <button class="btn btn-xs btn-secondary"
                                wire:click="$dispatch('deleteCustomer', {customer: {{ $customer->id }}})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @livewire('customer.actions')
    </div>
</div>
