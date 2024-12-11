<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pendaftar;
use Livewire\Component;

class SearchPendaftar extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.admin.search-pendaftar', [
            'pendaftar' => Pendaftar::where('nama', $this->search)->get(),
        ]);
    }
}
