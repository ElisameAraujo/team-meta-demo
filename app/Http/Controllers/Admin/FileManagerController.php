<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\DiskHelper;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class FileManagerController extends Controller
{
    public function index(Request $request)
    {
        $files = collect()
            ->merge(DiskHelper::scanDisk('complex'))
            ->merge(DiskHelper::scanDisk('buildings'))
            ->merge(DiskHelper::scanDisk('apartments'))
            ->merge(DiskHelper::scanDisk('transitions'))
            ->values()
            ->map(fn($file, $index) => [...$file, 'id' => $index + 1]);

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedItems = $files->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginator = new LengthAwarePaginator(
            $pagedItems,
            $files->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.file-manager.index', ['files' => $paginator]);
    }
}
