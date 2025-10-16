<?php

namespace App\Providers;

use App\Interfaces\Web\{ApartmentInterfaceWeb, BuildingInterfaceWeb, ComplexOverviewInterface};
use App\Repositories\Web\{ApartmentRepositoryWeb, BuildingRepositoryWeb, ComplexOverviewRepository};

use App\Interfaces\Admin\{ApartmentInterface, BuildingInterface, ComplexInterface};
use App\Repositories\Admin\{ApartmentRepository, BuildingRepository, ComplexRepository};

use Illuminate\Support\ServiceProvider;

class TeamMetaDemoProvider extends ServiceProvider
{
    public array $bindings = [
        ApartmentInterface::class => ApartmentRepository::class,
        ApartmentInterfaceWeb::class => ApartmentRepositoryWeb::class,
        BuildingInterface::class => BuildingRepository::class,
        BuildingInterfaceWeb::class => BuildingRepositoryWeb::class,
        ComplexInterface::class => ComplexRepository::class,
        ComplexOverviewInterface::class => ComplexOverviewRepository::class
    ];
}
