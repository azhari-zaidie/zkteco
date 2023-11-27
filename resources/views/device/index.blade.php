@extends('layout.layout')

@section('content')
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1">
        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class=" ">
                <a href="{{ route('machine.home') }}" class="btn btn-success" style="float:right;margin-left: 5px">
                    Back to home
                </a>
                <a href="{{ route('device.create') }}" class="btn btn-primary" style="float:right;margin-left: 5px">
                    Add New Device
                </a>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                <div class="ml-4 text-lg leading-7 font-semibold"><a class="underline text-gray-900 dark:text-white">All Devices</a></div>
            </div>

            <hr/>
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="device-table">
                                <thead>
                                    <tr>
                                        <th>Node ID</th>
                                        <th>Device Name</th>
                                        <th>Device IP</th>
                                        <th>Device Port</th>
                                        <th>Public IP</th>
                                        <th>Public Port</th>
                                        <th>Serial Number</th>
                                        <th>Model</th>
                                        <th>Machine No.</th>
                                        <th>Install Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($devices as $device)
                                    <tr>
                                        <td>{{ $device->device_number }}</td>
                                        <td>{{ $device->device_name }}</td>
                                        <td>{{ $device->device_ip }}</td>
                                        <td>{{ $device->device_port }}</td>
                                        <td>{{ $device->device_public_ip }}</td>
                                        <td>{{ $device->device_public_port }}</td>
                                        <td>{{ $device->device_serial_number }}</td>
                                        <td>{{ $device->device_model }}</td>
                                        <td>{{ $device->device_machine_no }}</td>
                                        <td>{{ $device->device_install_location }}</td>
                                        <td>
                                            {!! Form::open(['route' => ['device.destroy', $device->id], 'method' => 'delete']) !!}
                                            <div class="btn-group">
                                                <a href="{{ route('device.edit', [$device->id]) }}" class="btn btn-outline-primary btn-xs"></i>edit</a>
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection