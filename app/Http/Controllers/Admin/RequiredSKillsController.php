<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequiredSKillRequest;
use App\Http\Requests\StoreRequiredSKillRequest;
use App\Http\Requests\UpdateRequiredSKillRequest;
use App\Models\RequiredSKill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequiredSKillsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('required_skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequiredSKill::query()->select(sprintf('%s.*', (new RequiredSKill())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'required_s_kill_show';
                $editGate = 'required_s_kill_edit';
                $deleteGate = 'required_s_kill_delete';
                $crudRoutePart = 'required-s-kills';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? RequiredSKill::IS_ACTIVE_SELECT[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.requiredSKills.index');
    }

    public function create()
    {
        abort_if(Gate::denies('required_s_kill_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requiredSKills.create');
    }

    public function store(StoreRequiredSKillRequest $request)
    {
        $requiredSKill = RequiredSKill::create($request->all());

        return redirect()->route('admin.required-s-kills.index');
    }

    public function edit(RequiredSKill $requiredSKill)
    {
        abort_if(Gate::denies('required_s_kill_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requiredSKills.edit', compact('requiredSKill'));
    }

    public function update(UpdateRequiredSKillRequest $request, RequiredSKill $requiredSKill)
    {
        $requiredSKill->update($request->all());

        return redirect()->route('admin.required-s-kills.index');
    }

    public function show(RequiredSKill $requiredSKill)
    {
        abort_if(Gate::denies('required_s_kill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requiredSKill->load('requiredSkillCourses');

        return view('admin.requiredSKills.show', compact('requiredSKill'));
    }

    public function destroy(RequiredSKill $requiredSKill)
    {
        abort_if(Gate::denies('required_s_kill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requiredSKill->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequiredSKillRequest $request)
    {
        RequiredSKill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
