<?php

namespace App\Filament\Widgets;

use App\Models\artist;
use App\Models\Music;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Lagu', Music::count())
                ->description('Jumlah semua lagu yang ada')
                ->descriptionIcon('heroicon-m-musical-note')
                ->color('success'),
            Stat::make('Total Artist', artist::count())
                ->description('Jumlah artist yang terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
        ];
        
    }
}
