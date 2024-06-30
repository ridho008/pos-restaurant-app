<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;
    public $show = false;
    public $photo;
    public $newImg;
    public MenuForm $form;

    #[On('createMenu')]

    public function createMenu() {
        $this->show = true;
        $this->form->reset();
    }

    #[On('editMenu')]

    public function editMenu(Menu $menu) {
        $this->form->setMenu($menu);
        $this->show = true;
    }

    #[On('deleteMenu')]

    public function deleteMenu(Menu $menu) {
        $menu->delete();
        $this->dispatch('reload');
    }

    public function closeModal() {
        $this->show = false;
        $this->photo = null;
        $this->form->reset(); // reset input setelah di close modal
    }

    // CRUD
    public function save() {
        if($this->photo) {
            $this->form->photo = $this->photo->hashName('menus');
            $this->photo->store('menus');
            // $imageName = Carbon::now()->timestamp. '.' .$this->photo->extension();
            // $image = new Menu;
            // $imageName = Carbon::now()->timestamp. '.' .$this->photo->extension();
            // $this->photo->storeAs('image_uploads', $imageName);
            // $newImage = $image->photo = $imageName;
        }

        if(isset($this->form->menu)) {
            $this->form->update();
        } else {
            $this->form->store();
        }
        $this->closeModal();
        $this->dispatch('reload'); // refresh page
    }

    public function render()
    {
        return view('livewire.menu.actions', ['types' => Menu::$types]);
    }
}
