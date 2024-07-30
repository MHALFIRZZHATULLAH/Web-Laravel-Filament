<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Define form schema here
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lable'),
                Tables\Columns\TextColumn::make('value')->limit(50),
            ])
            ->filters([
                // Define filters here
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form(function(Setting $record) {
                    switch ($record->type) {
                        case 'text':
                            return [Forms\Components\TextInput::make('value')->label($record->label)];
                        case 'longtext':
                            return [Forms\Components\RichEditor::make('value')->label($record->label)];
                    }
                }),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSettings::route('/'),
        ];
    }    
}