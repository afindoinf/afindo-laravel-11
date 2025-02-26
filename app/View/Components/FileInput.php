<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileInput extends Component
{
    public $name;
    public $url;
    public $label;
    public $accept;
    public $id;

    public function __construct($name, $url = null, $label = 'Choose File', $accept = '*/*')
    {
        $this->name = $name;
        $this->url = $url;
        $this->label = $label;
        $this->accept = $accept;
        $this->id = uniqid('fileinput_');
    }
    
    public function render(): View|Closure|string
    {
        return view('components.file-input');
    }
}
