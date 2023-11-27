@extends('layout.layout')

@section('content')
<!-- <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"> -->
    <!-- <div class="grid grid-cols-1"> -->
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-0">
                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class=" ">
                        <a href="{{ route('machine.home') }}" class="btn btn-success" style="float:right">
                            Back to home
                        </a>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a class="underline text-gray-900 dark:text-white">Edit Device</a></div>
                    </div>

                    <hr/>
                    <div class="content">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::model($device, ['route' => ['device.update', $device->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_number', 'Device Node:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_number', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_name', 'Device Name:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_name', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_ip', 'Device IP:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_ip', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_port', 'Device Port:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_port', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_public_ip', 'Device Public IP:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_public_ip', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_public_port', 'Device Public Port:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_public_port', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_serial_number', 'Device Serial No:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_serial_number', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_model', 'Device Model:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_model', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_machine_no', 'Machine No:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_machine_no', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            {!! Form::label('device_install_location', 'Device Location:',['class'=>'col-md-4 col-lg-4 col-12 control-label']) !!}
                                            <div class="col-md-8 col-lg-8 col-12">
                                                {!! Form::text('device_install_location', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <br/>
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('device.index') }}" class="btn btn-danger">Cancel</a>
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- </div> -->
@endsection