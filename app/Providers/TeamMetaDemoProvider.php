<?php

namespace App\Providers;

use App\Interfaces\Web\BuildingInterfaceWeb;
use App\Repositories\Web\BuildingRepositoryWeb;
use App\Interfaces\{ApartmentInterface, ApartmentCoordinatesInterface, BuildingInterface};
use App\Repositories\{ApartmentCoordinatesRepository, ApartmentRepository, BuildingRepository};
use Illuminate\Support\ServiceProvider;

class TeamMetaDemoProvider extends ServiceProvider
{
    public array $bindings = [
        ApartmentInterface::class => ApartmentRepository::class,
        ApartmentCoordinatesInterface::class => ApartmentCoordinatesRepository::class,
        BuildingInterface::class => BuildingRepository::class,
        BuildingInterfaceWeb::class => BuildingRepositoryWeb::class
    ];
}
