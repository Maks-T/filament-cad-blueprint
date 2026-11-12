<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div
        wire:ignore
        x-load
        x-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('cad-viewer-component', 'maxim-tsatsura/filament-cad-blueprint') }}"
        x-data="cadViewerComponent({
            state: @js($getState()),
            options: {
                toolbar: @js($hasToolbar()),
                paper: @js($getPaperColor()),
                fitMargin: @js($getFitMargin()),
            }
        })"
        style="height: {{ $getHeight() }}; position: relative; border-radius: var(--radius-md, 0.5rem); overflow: hidden; border: 1px solid rgba(0, 0, 0, 0.1);"
    >
        <div x-ref="canvas" style="width: 100%; height: 100%;"></div>
    </div>
</x-dynamic-component>
