<?php

namespace MaximTsatsura\FilamentCadBlueprint;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CadBlueprintServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-cad-blueprint';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile('cad-blueprint')
            ->hasViews('filament-cad-blueprint');
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            AlpineComponent::make('cad-viewer-component', __DIR__ . '/../resources/dist/cad-viewer.js'),
        ], package: 'maxim-tsatsura/filament-cad-blueprint');
    }
}
