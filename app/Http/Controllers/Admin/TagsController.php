<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TagsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('tag_access'), 403);

        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('tag_create'), 403);

        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        abort_unless(\Gate::allows('tag_create'), 403);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.index');
    }

    public function edit(Tag $tag)
    {
        abort_unless(\Gate::allows('tag_edit'), 403);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        abort_unless(\Gate::allows('tag_edit'), 403);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index');
    }

    public function show(Tag $tag)
    {
        abort_unless(\Gate::allows('tag_show'), 403);

        return view('admin.tags.show', compact('tag'));
    }

    public function destroy(Tag $tag)
    {
        abort_unless(\Gate::allows('tag_delete'), 403);

        $tag->delete();

        return back();
    }

    public function massDestroy(MassDestroyTagRequest $request)
    {
        Tag::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
