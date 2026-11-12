<?php

namespace MaximTsatsura\FilamentCadBlueprint;

use Filament\Contracts\Plugin;
use Filament\Panel;

class CadBlueprintPlugin implements Plugin
{
    protected string $defaultScale = '1:10';
    protected bool $gost = true;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function getId(): string
    {
        return 'cad-blueprint';
    }

    public function defaultScale(string $scale): static
    {
        $this->defaultScale = $scale;
        return $this;
    }

    public function gost(bool $condition = true): static
    {
        $this->gost = $condition;
        return $this;
    }

    public function getDefaultScale(): string
    {
        return $this->defaultScale;
    }

    public function isGost(): bool
    {
        return $this->gost;
    }

    public function register(Panel $panel): void
    {
        // Регистрация ресурсов или страниц чертежей
    }

    public function boot(Panel $panel): void
    {
        // Инициализация панели
    }
}
