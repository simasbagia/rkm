<?php

namespace App\Http\Livewire\Front;

// use Livewire\Component;

use App\Models\W_link;
use App\Models\Widget;
use LivewireUI\Modal\ModalComponent;
use Redirect;

class LinkForm extends ModalComponent
{
    public $link;
    public function render()
    {
        $link = Widget::where('id', '=', $this->link)->first();
        // $links = W_link::where('id', '=', $this->link)->first();
        return view('livewire.front.link-form', [
            'link' => $link
        ]);
    }
    public function home()
    {
        return Redirect::route('home');
        // echo "<script>window.close();</script>";
    }
}
