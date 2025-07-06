<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGeneralSettingRequest;
use App\Models\GeneralSetting;
use App\Services\GeneralSetting\GeneralSettingService;

class GeneralSettingController extends Controller
{
    public $general_setting_service;

    public function __construct(GeneralSettingService $general_setting_service)
    {
        $this->general_setting_service = $general_setting_service ;
    }

    public function index(){
        $data['settings'] = $this->general_setting_service->getAGeneralSetting();
        return view('admin.form.general_setting.edit')->with($data);
    }

    public function update(UpdateGeneralSettingRequest $request, GeneralSetting $general_setting ){

        $data['settings'] = $this->general_setting_service->updateGeneralSetting($request, $general_setting);
        
        return redirect()
        ->route('admin.all.general.setting')
        ->with('success', 'Notepad and images update successfully.');
    }


}
