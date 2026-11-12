<?php

namespace MaximTsatsura\FilamentCadBlueprint\Infolists\Components;

use Closure;
use Filament\Infolists\Components\Entry;

class CadEntry extends Entry
{
    protected string $view = 'filament-cad-blueprint::infolists.components.cad-entry';

    protected bool | Closure $toolbar = true;
    protected string | Closure $height = '500px';
    protected string | Closure $paperColor = '#ffffff';
    protected int | Closure $fitMargin = 16;

    public function toolbar(bool | Closure $toolbar = true): static
    {
        $this->toolbar = $toolbar;
        return $this;
    }

    public function height(string | Closure $height): static
    {
        $this->height = $height;
        return $this;
    }

    public function paperColor(string $color): static
    {
        $this->paperColor = $color;
        return $this;
    }

    public function fitMargin(int $margin): static
    {
        $this->fitMargin = $margin;
        return $this;
    }

    public function hasToolbar(): bool
    {
        return $this->toolbar;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getPaperColor(): string
    {
        return $this->paperColor;
    }

    public function getFitMargin(): int
    {
        return $this->fitMargin;
    }
}
