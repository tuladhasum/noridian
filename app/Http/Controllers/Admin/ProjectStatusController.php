<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectStatusRequest;
use App\Http\Requests\StoreProjectStatusRequest;
use App\Http\Requests\UpdateProjectStatusRequest;
use App\ProjectStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectStatusController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('project_status_access'), 403);

        $projectStatuses = ProjectStatus::all();

        return view('admin.projectStatuses.index', compact('projectStatuses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('project_status_create'), 403);

        return view('admin.projectStatuses.create');
    }

    public function store(StoreProjectStatusRequest $request)
    {
        abort_unless(\Gate::allows('project_status_create'), 403);

        $projectStatus = ProjectStatus::create($request->all());

        return redirect()->route('admin.project-statuses.index');
    }

    public function edit(ProjectStatus $projectStatus)
    {
        abort_unless(\Gate::allows('project_status_edit'), 403);

        return view('admin.projectStatuses.edit', compact('projectStatus'));
    }

    public function update(UpdateProjectStatusRequest $request, ProjectStatus $projectStatus)
    {
        abort_unless(\Gate::allows('project_status_edit'), 403);

        $projectStatus->update($request->all());

        return redirect()->route('admin.project-statuses.index');
    }

    public function show(ProjectStatus $projectStatus)
    {
        abort_unless(\Gate::allows('project_status_show'), 403);

        return view('admin.projectStatuses.show', compact('projectStatus'));
    }

    public function destroy(ProjectStatus $projectStatus)
    {
        abort_unless(\Gate::allows('project_status_delete'), 403);

        $projectStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectStatusRequest $request)
    {
        ProjectStatus::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
