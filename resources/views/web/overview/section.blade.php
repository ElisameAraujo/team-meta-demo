@extends('layouts.web')
@section('title', $section->section_name)

@section('content')

    @livewire('complex-viewer', [
        'sectionSlug' => $section->section_slug,
        'currentSide' => $currentSide,
        'pageImage' => $pageImage,
        'transition' => $transition,
    ])
@endsection
