<div>
    <!-- The button to open modal -->
    {{-- <label for="my_modal_6" class="btn">open modal</label> --}}


    <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($show) />

    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Form Input Menus</h3>
            <div class="py-4 space-y-2">
                <form wire:submit="save" enctype="multipart/form-data">
                    <div class="flex justify-center">
                        <label for="pickphoto" class="avatar">
                            <div class="w-24 rounded">
                                <img src="{{ $photo ? $photo->temporaryUrl() : url('no-image.jpg') }}" />
                            </div>
                        </label>
                    </div>
                    <input type="file" id="pickphoto" hidden wire:model="photo">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Menu Name</span>
                        </div>
                        <input type="text" @class([
                            'input input-bordered flex items-center gap-2',
                            'input-error' => $errors->first('form.name'),
                        ]) placeholder="menu name"
                            wire:model="form.name" />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Price</span>
                        </div>
                        <input type="number" @class([
                            'input input-bordered flex items-center gap-2',
                            'input-error' => $errors->first('form.price'),
                        ]) placeholder="price"
                            wire:model="form.price" />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Type</span>
                        </div>
                        <select @class([
                            'select select-bordered flex items-center gap-2',
                            'input-error' => $errors->first('form.type'),
                        ]) wire:model="form.type">
                            <option value=""></option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea @class([
                            'textarea textarea-bordered',
                            'input-error' => $errors->first('form.description'),
                        ]) placeholder="description" wire:model="form.description"></textarea>
                    </div>



            </div>
            <div class="modal-action">
                <button type="button" for="my_modal_6" wire:click="closeModal" class="btn btn-ghost">Close!</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
