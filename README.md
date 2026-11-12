# Filament CAD Blueprint

Интеграция параметрического 2D CAD-движка [`cad-blueprint`](https://www.npmjs.com/package/cad-blueprint) для Filament 5.

## Установка

```bash
composer require maxim-tsatsura/filament-cad-blueprint
```

## Использование

### В карточке просмотра (Infolist)

```php
use MaximTsatsura\FilamentCadBlueprint\Infolists\Components\CadEntry;

public static function infolist(Infolist $infolist): Infolist
{
    return $infolist->schema([
        CadEntry::make('drawing_json')
            ->label('Инженерный чертёж')
            ->height('600px')
            ->toolbar(true),
    ]);
}
```

### В форме (Form)

```php
use MaximTsatsura\FilamentCadBlueprint\Forms\Components\CadViewerField;

public static function form(Form $form): Form
{
    return $form->schema([
        CadViewerField::make('drawing_json')
            ->label('Схема изделия')
            ->height('550px'),
    ]);
}
```
