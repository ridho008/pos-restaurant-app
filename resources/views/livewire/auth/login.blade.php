<div>
    <div class="card w-96 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Login</h2>
            <p>If a dog chews shoes whose shoes does he choose? </p>
        </div>
        <div class="px-4 space-y-2 py-1">
            <div class="grid grid-cols-1 gap-1">
                <form wire:submit="login">
                    <label class="form-control w-full">
                        {{-- Input Email --}}
                        <label @class([
                            'input input-bordered flex items-center gap-2 mt-2',
                            'input-error' => $errors->first('email'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path
                                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                <path
                                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                            </svg>
                            <input type="email" class="grow" wire:model="email" placeholder="your email" />

                        </label>
                        <div class="label">
                            @error('email')
                                <span class="error label-text-alt text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <label class="form-control w-full">
                        {{-- Input Password --}}
                        <label @class([
                            'input input-bordered flex items-center gap-2 mt-2',
                            'input-error' => $errors->first('password'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="password" class="grow" wire:model="password" />

                        </label>
                        <div class="label">
                            @error('password')
                                <span class="error label-text-alt text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>



                    <div class="card-actions justify-end pt-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
