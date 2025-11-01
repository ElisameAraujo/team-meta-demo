@extends('layouts.admin')
@section('title', 'File Manager')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
            </h1>
        </div>
        <div class="page-actions">
            <a class="btn btn-success" onclick="document.getElementById('cleanOrphans').showModal()">
                <i class="fa-solid fa-broom"></i>
                Clean Orphans Files
            </a>
        </div>
        @livewire('storage-stats')
        @include('components.flash-messages')
        @include('components.admin.clean-orphans-files')

        <div class="alert alert-error col-span-12 text-white hidden clean-orphans-error transition-opacity duration-500 ease-in-out"
            role="alert">
            <i class="fa-solid fa-xmark"></i> <span id="message-error"></span>
        </div>

        <div class="alert alert-success col-span-12 text-white hidden clean-orphans-success transition-opacity duration-500 ease-in-out"
            role="alert">
            <i class="fa-regular fa-circle-check"></i> <span id="message-success"></span>
        </div>

        <div role="alert"
            class="alert alert-simulation col-span-12 hidden clean-orphans-simulation transition-opacity duration-500 ease-in-out">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span id="message-simulation"></span>
        </div>

        @if ($files->count() < 1)
            <div class="col-span-12 text-center">
                <p>No files found for create the list.</p>
            </div>
        @else
            <div class="col-span-12">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File</th>
                                <th>Disk</th>
                                <th>Size in Disk</th>
                                <th>Created At</th>
                                <th>Modified in</th>
                                <th>Model Reference</th>
                                <th>Is Orphan?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr class="{{ $file['is_orphan'] ? 'bg-yellow-100/50' : '' }}">
                                    <td>{{ $file['id'] }}</td>
                                    <td>{{ $file['name'] }}</td>
                                    <td>{{ $file['disk'] }}</td>
                                    <td>{{ $file['size'] ?? '—' }}</td>
                                    <td>{{ $file['created_at'] ? $file['created_at']->format('d/m/Y H:i:s') : '—' }}</td>
                                    <td>{{ $file['modified_at'] ?? '—' }}</td>
                                    <td>{{ $file['referenced_by'] ?? '—' }}</td>
                                    <td>
                                        @if ($file['is_orphan'])
                                            <span class="badge bg-error text-white">True</span>
                                        @else
                                            <span class="badge bg-success text-white">False</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        @endif
        <div class="col-span-12">
            {{ $files->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.addEventListener('close-modal', () => {
                const modal = document.getElementById('cleanOrphans');
                modal.close();
            });

            window.addEventListener('custom-alert', event => {
                const {
                    type,
                    message
                } = Array.isArray(event.detail) ?
                    event.detail[0] :
                    event.detail;

                const alertMap = {
                    error: {
                        container: document.querySelector('.clean-orphans-error'),
                        target: document.getElementById('message-error'),
                    },
                    success: {
                        container: document.querySelector('.clean-orphans-success'),
                        target: document.getElementById('message-success'),
                    },
                    simulation: {
                        container: document.querySelector('.clean-orphans-simulation'),
                        target: document.getElementById('message-simulation'),
                    }
                };

                const alert = alertMap[type];
                if (!alert) return;

                alert.target.textContent = message ?? 'Mensagem não definida';
                alert.container.classList.remove('hidden');

                setTimeout(() => {
                    alert.container.classList.add('opacity-0');
                    setTimeout(() => {
                        alert.container.classList.add('hidden');
                        alert.target.textContent = '';
                        alert.container.classList.remove('opacity-0');
                    }, 500); // tempo da transição
                }, 5000);
            });
        });
    </script>

@endsection
