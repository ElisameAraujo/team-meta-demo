@extends('layouts.web')
@section('title', 'Homepage')

@section('content')

    @livewire('complex-viewer', [
        'sectionSlug' => null,
        'currentSide' => $currentSide,
        'complexBackground' => $complexBackground,
        'transition' => $transition,
    ])

@endsection
