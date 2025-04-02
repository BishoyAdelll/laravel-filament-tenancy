<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    public static function label(): string
    {
        return __('custom.appointments');
    }
    public static function getPluralModelLabel(): string
    {

        return __('custom.appointments');
    }
    public static function getModelLabel(): string
    {
        return __('custom.appointments');
    }
    public static function getNavigationLabel(): string
    {

        return __('custom.appointments');
    }


    protected static ?string $navigationIcon = 'heroicon-o-clock';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('visitor_name')
                    ->label(__('custom.visitor_name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('job')
                    ->label(__('custom.job'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('national_number')
                    ->label(__('custom.national_number'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('reason')
                    ->label(__('custom.reason'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('start_time')
                    ->label(__('custom.start_time'))
                    ->seconds(false)
                    ->required(),
                Forms\Components\DateTimePicker::make('end_time')
                    ->label(__('custom.end_time'))
                    ->seconds(false)
                    ->nullable(),
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'name')
                    ,
                Forms\Components\Select::make('team_id')
                    ->relationship('team', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visitor_name')
                    ->label(__('custom.visitor_name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('job')
                    ->label(__('custom.job'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('national_number')
                    ->label(__('custom.national_number'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('reason')
                    ->label(__('custom.reason'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('start_time')
                    ->label(__('custom.start_time'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->label(__('custom.end_time'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('custom.created_by'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team.name')
                    ->label(__('custom.team'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label(__('custom.employee'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
