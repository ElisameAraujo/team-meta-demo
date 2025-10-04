@extends('layouts.admin')
@section('title', 'Home Configuration')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
            </h1>
        </div>
        <div class="page-actions">
            <a class="btn btn-success" href="{{ route('admin.home.new-slide') }}">
                <i class="fa-solid fa-plus"></i>
                New Slide
            </a>
        </div>
        <div class="col-span-12 grid-default">
            <div class="col-span-3">
                <div class="card bg-base-100 shadow-sm">
                    <figure>
                        <img src="{{ asset('img/background-example-overview.jpg') }}" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Overview <span class="badge badge-sm badge-info">Start Slide</span></h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="card bg-base-100 shadow-sm">
                    <figure>
                        <img src="{{ asset('img/background-example-east.jpg') }}" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">East</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="card bg-base-100 shadow-sm">
                    <figure>
                        <img src="{{ asset('img/background-example-west.jpg') }}" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">West</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="card bg-base-100 shadow-sm">
                    <figure>
                        <img src="{{ asset('img/background-example-north.jpg') }}" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">North</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="card bg-base-100 shadow-sm">
                    <figure>
                        <img src="{{ asset('img/background-example-south.jpg') }}" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">South</h2>
                        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection