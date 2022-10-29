<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkillsCoveredRequest;
use App\Http\Requests\StoreSkillsCoveredRequest;
use App\Http\Requests\UpdateSkillsCoveredRequest;
use App\Models\SkillsCovered;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SkillsCoveredController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('skills_covered_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SkillsCovered::query()->select(sprintf('%s.*', (new SkillsCovered())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'skills_covered_show';
                $editGate = 'skills_covered_edit';
                $deleteGate = 'skills_covered_delete';
                $crudRoutePart = 'skills-covereds';

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
                return $row->is_active ? SkillsCovered::IS_ACTIVE_SELECT[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.skillsCovereds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('skills_covered_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skillsCovereds.create');
    }

    public function store(StoreSkillsCoveredRequest $request)
    {
        $skillsCovered = SkillsCovered::create($request->all());

        return redirect()->route('admin.skills-covereds.index');
    }

    public function edit(SkillsCovered $skillsCovered)
    {
        abort_if(Gate::denies('skills_covered_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skillsCovereds.edit', compact('skillsCovered'));
    }

    public function update(UpdateSkillsCoveredRequest $request, SkillsCovered $skillsCovered)
    {
        $skillsCovered->update($request->all());

        return redirect()->route('admin.skills-covereds.index');
    }

    public function show(SkillsCovered $skillsCovered)
    {
        abort_if(Gate::denies('skills_covered_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skillsCovered->load('skillCoveredCourses');

        return view('admin.skillsCovereds.show', compact('skillsCovered'));
    }

    public function destroy(SkillsCovered $skillsCovered)
    {
        abort_if(Gate::denies('skills_covered_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skillsCovered->delete();

        return back();
    }

    public function massDestroy(MassDestroySkillsCoveredRequest $request)
    {
        SkillsCovered::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
