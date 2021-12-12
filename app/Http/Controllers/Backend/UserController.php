<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\CommonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Traits\FileHandlerTrait;

class UserController extends Controller
{
    use FileHandlerTrait;

    private $view_path = 'backend.users.';
    private $route_path = 'users.';
    private $commonRepository;
    private $user;

    public function __construct(Request $request, CommonRepository $commonRepository)
    {
        $this->user = new User;
        $this->commonRepository = $commonRepository;
    }


    public function index(Request $request)
    {
        if (!auth()->user()->can('user-list')) {
            abort(403);
        }

        $data['request'] = $request->all();
        $query = $this->getQuery($request);
        $data['tableData'] = $query->paginate(20);

        return view($this->view_path . 'index')->with($data);
    }


    public function create()
    {
        if (!auth()->user()->can('user-create')) {
            abort(403);
        }

        $data['roleList'] = $this->commonRepository->userTypeList();

        return view($this->view_path . 'create')->with($data);
    }


    public function store(UserRequest $request)
    {
        if (!auth()->user()->can('user-create')) {
            abort(403);
        }

        try {
            // $fileName = $this->processImage($request, 'photo', 'user/', 413, 531, [
            //     [
            //         'path' => 'thumbnails/',
            //         'width' => 50,
            //         'height' => 50,
            //         'crop_resize' => 'resize'
            //     ]
            // ], 'resize');

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            // $input['photo'] = $fileName;


            \DB::beginTransaction();

            $user = $this->user->create($input);
            $user->assignRole($request->input('roles'));


            \DB::commit();
            // toast('User created.', 'success');

            return redirect()->route('admin.users.index')->with('success', ['User created']);
        } catch (\Exception $e) {
            \DB::rollback();

            $logMessage = formatCommonErrorLogMessage($e);
            writeToLog($logMessage, 'error');
            // alert()->error('Failed', trans('alert_message.error_message'));

            // return redirect()->back()->with('fail', ['Something went wrong. Please try again later.']);
            return redirect()->back()->with('fail', ['Something went wrong. Please try again later.']);
        }
    }


    public function show($id)
    {
        $data['user'] = $this->user->findorFail($id);

        return view($this->view_path . 'show')->with($data);
    }

    public function edit($id)
    {
        if (!auth()->user()->can('user-edit')) {
            abort(403);
        }

        $data['editModeData'] = $this->user->findOrFail($id);
        $data['roles'] = Role::pluck('name', 'name')->all();
        $data['userRole'] = $data['editModeData']->roles->pluck('name', 'name')->all();

        return view($this->view_path . 'edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('user-edit')) {
            abort(403);
        }

        try {
            // $fileName = $this->processImage($request, 'photo', 'user/', 413, 531, [
            //     [
            //         'path' => 'thumbnails/',
            //         'width' => 50,
            //         'height' => 50,
            //         'crop_resize' => 'resize'
            //     ]
            // ], 'resize');


            $input = $request->all();
            // if (!is_null($fileName)) {
            //     $input['photo'] = $fileName;
            // }

            $user = $this->user->findorFail($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($request->input('roles'));


            // toast('User updated.', 'success');

            return redirect()->route('admin.users.index')->with('success', ['User updated']);

        } catch (\Exception $e) {
            \DB::rollback();

            $logMessage = formatCommonErrorLogMessage($e);
            writeToLog($logMessage, 'error');
            // alert()->error('Failed', ['Something went wrong. Please try again later.']);

            // return redirect()->back()->with('fail', ['Something went wrong. Please try again later.']);
            return redirect()->back()->with('fail', ['Something went wrong. Please try again later.']);
        }
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.users.index')->with('success', ['User deleted successfully']);
    }

    private function getQuery($request)
    {
        $query = $this->user->with(['user_types:id,name'])->orderBy('id', 'desc');

        if (isset($request->name)) {
            $query->where('name', $request->name);
        }

        if (isset($request->from_date)) {
            $query->whereDate('created_at', '>=', dateConvertFormtoDB($request->from_date));
        }

        if (isset($request->to_date)) {
            $query->whereDate('created_at', '<=', dateConvertFormtoDB($request->to_date));
        }

        return $query;
    }
}
