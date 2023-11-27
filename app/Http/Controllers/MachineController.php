<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function device_ip()
    {
        //
        // if (session()->exists('dip')) {
        //     $deviceip = session('dip');
        // }
        // else
        // {
        //     session()->put('dip', '192.168.1.100');
        //     $deviceip = '192.168.1.100';
        // }
        // return $deviceip;
    }
    public function device_setip(Request $request)
    {
        // dd($request->all());
        // session()->put('dip', $request->deviceip);
        // return redirect()->back();

        if($request->device_id == null) {
            Alert::info('Info', 'Make sure device field is not empty.');
            return redirect()->back();
        }

        $currentD = Device::where('id', $request->device_id)->first();
        return view('welcome', compact('currentD'));
        
    }
    public function index()
    {
        // $deviceip = $this->device_ip();
        // return view('welcome',compact('deviceip'));

        $devices = Device::all();
        return view('welcome', compact('devices'));
    }
    public function test_sound()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->testVoice(); 
        return redirect()->back()->with('success_message','Playing sound on device.');
    }

    public function device_information()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $deviceVersion = $zk->version();
        $deviceOSVersion = $zk->osVersion();
        $devicePlatform = $zk->platform();
        $devicefmVersion = $zk->fmVersion();
        $deviceworkCode = $zk->workCode();
        $devicessr = $zk->ssr();
        $devicepinWidth = $zk->pinWidth();
        $deviceserialNumber = $zk->serialNumber();
        $devicedeviceName = $zk->deviceName();
        $devicegetTime = $zk->getTime();
        return view('device-information',compact(
            'deviceip','deviceVersion','deviceOSVersion','devicePlatform','devicefmVersion','deviceworkCode',
            'devicessr','devicepinWidth','deviceserialNumber','devicedeviceName','devicegetTime',
        ));
    }

    public function device_data($id)
    {
        dd($id);
        // $deviceip = $this->device_ip();
        // $zk = new ZKTeco($deviceip,4370);
        // $zk->connect(); 
        // $zk->disableDevice();  
        // $users = $zk->getUser();
        // $attendaces = $zk->getAttendance();
        // // dd($attendaces);
        // return view('device-data',compact(
        //     'deviceip','users','attendaces',
        // ));

        $device = Device::where('id', $id)->first();
        $deviceIP = $device['device_ip'];
        $devicePort = $device['device_port'];

        $zk = new ZKTeco($deviceIP, $devicePort);
        $zk->connect(); 
        $zk->disableDevice();
        $users = $zk->getUser();
        dd($users);
    }
    public function device_data_clear_attendance()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->clearAttendance();

        return redirect()->back()->with('success_message','Attendance cleared successfully.');
    }

    public function device_restart()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->restart();

        return redirect()->back()->with('success_message','Device restart successfully.');
    }

    public function device_shutdown()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->shutdown();

        return redirect()->back();
    }

    public function device_adduser()
    {
        $deviceip = $this->device_ip();
        return view('device-adduser',compact('deviceip'));
    }

    public function device_setuser(Request $request)
    {
       $deviceip = $this->device_ip();
       $uid = $request->uid;
       $userid = $request->userid;
       $name = $request->name;
       $role = (int)$request->role;
       $password = $request->password;
       $cardno = $request->cardno;
       //dd($request->role);
       $zk = new ZKTeco($deviceip,4370);
       $zk->connect(); 
       $zk->disableDevice();  
       $zk->setUser($uid , $userid , $name , $role , $password , $cardno);

       return redirect()->back()->with('success_message','User added to device successfully.');
    }

    public function device_removeuser_single($uid)
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $zk->disableDevice();  
        $zk->removeUser($uid);

        return redirect()->back()->with('success_message','User removed from device successfully.');
    }

    public function device_viewuser_single(Request $request)
    {
        $deviceip = $this->device_ip();
        $uid = $request->uid;
        $userid = $request->userid;
        $name = $request->name;
        $role = (int)$request->role;
        $password = $request->password;
        $cardno = $request->cardno;

        $zk = new ZKTeco($deviceip,4370);
        $zk->connect(); 
        $userfingerprints=$zk->getFingerprint($request->uid);
        
        // foreach($userfingerprints as $userfingerprint)
        // {
        //     $imagearray= unpack("C*",$userfingerprint); 
        // }
        // $data = implode('', array_map(function($e) {
        //     return pack("C*", $e);
        // }, $$userfingerprint));
        // echo $data;
        // dd($data);
        
        //dd($userfingerprints);
        return view('device-information-user',compact(
            'deviceip','uid','userid','name',
            'role','password','cardno','userfingerprints',
        ));
    }

    public function device_data_export()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);

        try {
            $zk->connect(); 
            $zk->disableDevice();  
            $users = $zk->getUser();
            $attendances = $zk->getAttendance();
            // dd($users);

            if (empty($attendances)) {
                // No attendance data to export
                return response()->json(['message' => 'No attendance data available.']);
            }

            $txtData = '';

            foreach ($attendances as $data) {
                // dd($data);

                $timestampStr = $data['timestamp'];
                $timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $timestampStr);

                $year = $timestamp->format('Y');
                $month = $timestamp->format('m');
                $day = $timestamp->format('d');
                $hour = $timestamp->format('H');
                $minute = $timestamp->format('i');
                // dd('Year = '. $year, 'Month = '. $month, 'Day = '. $day, 'Hour = '. $hour, 'Minute = '. $minute);

                $userId = str_pad($data['id'], 8, '0', STR_PAD_LEFT);

                $txtData .= 'DD'.$year.$month.$day.$hour.$minute.$userId."\r\n";

            }
                // dd($txtData);

            $file_name = 'DeviceDataExport_'.now()->format('Y_m_d').'.txt';

            // dd($file_name);

            Storage::put($file_name, $txtData);
            // Storage::disk('local')->put($file_name, $txtData);
            
            // Move the file to the public directory (make it accessible for download)
            Storage::move($file_name, 'public/'.$file_name);
    
            // Get the public URL for the file
            $publicUrl = Storage::url($file_name);
    
            return response()->json(['url' => $publicUrl]);
            
            // return response()->download(storage_path($file_name))->deleteFileAfterSend();
        }
        catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
        // finally {
        //     $zk->enableDevice();
        //     $zk->disconnect();
        // }
    }
}
