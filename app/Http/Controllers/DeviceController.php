<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();

        return view('device.index')->with('devices', $devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('device.add_new_device');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $devices = Device::create([
            'device_number' => $request->device_number,
            'device_name' => $request->device_name,
            'device_ip' => $request->device_ip,
            'device_port' => $request->device_port,
            'device_public_ip' => $request->device_public_ip,
            'device_public_port' => $request->device_public_port,
            'device_serial_number' => $request->device_serial_number,
            'device_model' => $request->device_model,
            'device_machine_no' => $request->device_machine_no,
            'device_install_location' => $request->device_install_location,
        ]);

        Alert::success('Success', 'Data has been saved successfully');

        return redirect()->route('device.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $device = Device::find($id);

        if (empty($device)) {
            return redirect(route('device.index'));
        }

        return view('device.edit')->with('device', $device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // dd($id);
        $update_device = Device::find($id)->update([
            'device_number' => $request->device_number,
            'device_name' => $request->device_name,
            'device_ip' => $request->device_ip,
            'device_port' => $request->device_port,
            'device_public_ip' => $request->device_public_ip,
            'device_public_port' => $request->device_public_port,
            'device_serial_number' => $request->device_serial_number,
            'device_model' => $request->device_model,
            'device_machine_no' => $request->device_machine_no,
            'device_install_location' => $request->device_install_location,
        ]);

        return redirect(route('device.index'))->with('success', 'Device updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
