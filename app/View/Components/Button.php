<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Button extends Component
{
    public string $tag;

    public ?string $href;

    public ?string $type;

    public bool $disabled;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $disabled = false,
        ?string $href = null,
        ?string $type = null,
    ) {
        $this->href = $href;
        $this->type = $type;
        $this->disabled = $disabled;

        if ($this->href) {
            $this->tag = 'a';
            $this->type = null;
            $this->disabled = false;
        } else {
            $this->tag = 'button';
            $this->type = in_array($type, ['button', 'submit', 'reset'])
                ? $type
                : 'button';
        }
    }

    public function contextualizedAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        if ($this->href) {
            $attributes = $attributes->merge(['href' => $this->href]);
        }

        if ($this->disabled) {
            $attributes = $attributes->merge(['disabled' => '']);
        }

        if ($this->type) {
            $attributes = $attributes->merge(['type' => $this->type]);
        }

        return $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
