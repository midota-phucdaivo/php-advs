<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Log;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    protected $data = [];

    protected function initData($data)
    {
        $this->data = $data;
    }

    protected function index(Request $request)
    {
        //    return $this->data['tableData']->getOptions();

        return view('admin.list')->with('data', $this->data);
    }

    protected function generateForm(Request $request, $data)
    {
        $this->data['form'] = $data;

        return view('admin.form')->with('data', $this->data);
    }

    protected function saveForm(Request $request, $data)
    {
        $validator = Validator::make(Input::all(), $data::$rules, $data::$messages);
        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            foreach ($this->data['header'] as $key => $item) {
                if (isset($item['save']) && is_callable($item['save'])) {
                    call_user_func($item['save'], $request, $data);
                } elseif (isset($item['edit']) && !is_callable($item['edit']) && isset($request[$item['key']])) {
                    if (isset($item['edit']['type'])) {
                        switch ($item['edit']['type']) {
                        case 'checkbox':
                            $data[$item['key']] = $request[$item['key']] ? 1 : 0;
                            break;

                        case 'image':
                            if (isset($request[$item['key']])) {
                                $fileOld = $data[$item['key']];

                                $file = $request[$item['key']];
                                $path = time().'_'.$file->getClientOriginalName();
                                $data[$item['key']] = $file->move('uploads/images/'.(isset($item['edit']['src']) ? $item['edit']['src'].'/' : ''), $path);

                                if (File::exists($fileOld)) {
                                    File::delete($fileOld);
                                }
                            }
                            break;

                        default:
                            $data[$item['key']] = $request[$item['key']];
                            break;
                    }
                    } else {
                        $data[$item['key']] = $request[$item['key']];
                    }
                }
            }

            $data->save();
            $request->session()->flash('status', "Swal.fire(
                'Thành công!',
                'Click để tiếp tục',
                'success'
            )");
            DB::commit();
        } catch (\Exception $e) {
            $request->session()->flash('status', "Swal.fire(
            'Không thành công!',
            'Click để tiếp tục',
            'error'
        )");
            Log::error('Error message: '.$e->getMessage());
            DB::rollback();
        }

        return redirect(url()->action($this->data['controller'].'@index'));
    }

    protected function deleteItem(Request $request, $data)
    {
        DB::beginTransaction();
        try {
            $data->delete();
            $request->session()->flash('status', "Swal.fire(
                'Thành công!',
                'Click để tiếp tục',
                'success'
            )");
            DB::commit();
        } catch (\Exception $e) {
            $request->session()->flash('status', "Swal.fire(
                'Không thành công!',
                'Click để tiếp tục',
                'error'
            )");
            DB::rollback();
        }

        return redirect(url()->action($this->data['controller'].'@index'));
    }

    protected function activeItem(Request $request, $data)
    {
        DB::beginTransaction();
        try {
            $data->active = ($request->data == 'false') ? 1 : 0;
            $data->save();
            DB::commit();

            return  $data->active;
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
