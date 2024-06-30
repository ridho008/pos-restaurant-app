<div class="card bg-base-100 my-2">
    <div class="card-body">
        <h3 class="card-title">Edit Profile</h3>
        <div class="py-3 space-y-2">
            <form wire:submit="save">
                <div class="grid grid-cols-2 gap-2">
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Fullname</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered" wire:model="name" />
                        <div class="label">
                            @error('name')
                                <span class="error text-red-600 label-text-alt">{{ $message }}</span>
                            @enderror

                        </div>
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input type="email" placeholder="Type here" class="input input-bordered" wire:model="email" />
                        <div class="label">
                            @error('email')
                                <span class="error label-text-alt text-red-600">{{ $message }}</span>
                            @enderror

                        </div>
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">New Password</span>
                        </div>
                        <input type="password" placeholder="Type here" class="input input-bordered"
                            wire:model="password" />
                        <div class="label">
                            @error('password')
                                <span class="error label-text-alt">{{ $message }}</span>
                            @enderror

                        </div>
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Confirm Password</span>
                        </div>
                        <input type="password" placeholder="Type here" class="input input-bordered"
                            wire:model="password_confirmation" />
                        <div class="label">
                            @error('password_confirmation')
                                <span class="error label-text-alt">{{ $message }}</span>
                            @enderror

                        </div>
                    </label>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
