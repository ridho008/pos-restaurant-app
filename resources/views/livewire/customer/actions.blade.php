<div>
    <!-- The button to open modal -->
    {{-- <label for="my_modal_6" class="btn">open modal</label> --}}


    <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($show) />

    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Form Input Menus</h3>
            <div class="py-4 space-y-2">
                <form wire:submit="save">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Fullname</span>
                        </div>
                        <input type="text" @class([
                            'input input-bordered flex items-center gap-2',
                            'input-error' => $errors->first('form.name'),
                        ]) placeholder="fullname"
                            wire:model="form.name" />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Contact</span>
                        </div>
                        <input type="text" @class([
                            'input input-bordered flex items-center gap-2',
                            'input-error' => $errors->first('form.contact'),
                        ]) placeholder="contact"
                            wire:model="form.contact" />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea @class([
                            'textarea textarea-bordered',
                            'input-error' => $errors->first('form.desc'),
                        ]) placeholder="description" wire:model="form.desc"></textarea>
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
