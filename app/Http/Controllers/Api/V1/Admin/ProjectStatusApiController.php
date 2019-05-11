<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectStatusRequest;
use App\Http\Requests\UpdateProjectStatusRequest;
use App\ProjectStatus;

class ProjectStatusApiController extends Controller
{
    public function index()
    {
        $projectStatuses = ProjectStatus::all();

        return $projectStatuses;
    }

    public function store(StoreProjectStatusRequest $request)
    {
        return ProjectStatus::create($request->all());
    }

    public function update(UpdateProjectStatusRequest $request, ProjectStatus $projectStatus)
    {
        return $projectStatus->update($request->all());
    }

    public function show(ProjectStatus $projectStatus)
    {
        return $projectStatus;
    }

    public function destroy(ProjectStatus $projectStatus)
    {
        return $projectStatus->delete();
    }
}
