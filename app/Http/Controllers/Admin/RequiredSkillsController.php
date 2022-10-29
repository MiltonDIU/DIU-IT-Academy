<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequiredSkillRequest;
use App\Http\Requests\StoreRequiredSkillRequest;
use App\Http\Requests\UpdateRequiredSkillRequest;
use App\Models\LessonType;
use App\Models\RequiredSkill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequiredSkillsController extends Controller
{
    public function index(Request $request)
    {

        abort_if(Gate::denies('required_skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        if ($request->ajax()) {
//            $query = RequiredSkill::query()->select(sprintf('%s.*', (new RequiredSkill())->table));
//            $table = Datatables::of($query);
//
//            $table->addColumn('placeholder', '&nbsp;');
//            $table->addColumn('actions', '&nbsp;');
//
//            $table->editColumn('actions', function ($row) {
//                $viewGate = 'required_skill_show';
//                $editGate = 'required_skill_edit';
//                $deleteGate = 'required_skill_delete';
//                $crudRoutePart = 'required-skills';
//
//                return view('partials.datatablesActions', compact(
//                    'viewGate',
//                    'editGate',
//                    'deleteGate',
//                    'crudRoutePart',
//                    'row'
//                ));
//            });
//
//            $table->editColumn('id', function ($row) {
//                return $row->id ? $row->id : '';
//            });
//            $table->editColumn('title', function ($row) {
//                return $row->title ? $row->title : '';
//            });
//            $table->editColumn('slug', function ($row) {
//                return $row->slug ? $row->slug : '';
//            });
//            $table->editColumn('is_active', function ($row) {
//                return $row->is_active ? RequiredSkill::IS_ACTIVE_SELECT[$row->is_active] : '';
//            });
//
//            $table->rawColumns(['actions', 'placeholder']);
//
//            return $table->make(true);
//        }

        $requiredSkills = RequiredSkill::where('is_active','1')->get();

        return view('admin.RequiredSkills.index',compact('requiredSkills'));
    }

    public function create()
    {
        abort_if(Gate::denies('required_skill_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.RequiredSkills.create');
    }

    public function store(StoreRequiredSkillRequest $request)
    {
        $RequiredSkill = RequiredSkill::create($request->all());

        return redirect()->route('admin.required-s-kills.index');
    }

    public function edit(RequiredSkill $RequiredSkill)
    {
        abort_if(Gate::denies('required_skill_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.RequiredSkills.edit', compact('RequiredSkill'));
    }

    public function update(UpdateRequiredSkillRequest $request, RequiredSkill $RequiredSkill)
    {
        $RequiredSkill->update($request->all());

        return redirect()->route('admin.required-s-kills.index');
    }

    public function show(RequiredSkill $RequiredSkill)
    {
        abort_if(Gate::denies('required_skill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $RequiredSkill->load('RequiredSkillCourses');

        return view('admin.RequiredSkills.show', compact('RequiredSkill'));
    }

    public function destroy(RequiredSkill $RequiredSkill)
    {
        abort_if(Gate::denies('required_skill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $RequiredSkill->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequiredSkillRequest $request)
    {
        RequiredSkill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
