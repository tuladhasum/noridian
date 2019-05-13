<?php

namespace App\Http\Controllers\Admin;

use App\Example;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExampleRequest;
use App\Http\Requests\StoreExampleRequest;
use App\Http\Requests\UpdateExampleRequest;
use App\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExampleController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('example_access'), 403);

        $examples = Example::all();

        return view('admin.examples.index', compact('examples'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('example_create'), 403);

        $tags = Tag::all()->pluck('name', 'id');

        $hospitals = Hospital::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.examples.create', compact('tags', 'hospitals'));
    }

    public function store(StoreExampleRequest $request)
    {
        abort_unless(\Gate::allows('example_create'), 403);

        $example = Example::create($request->all());
        $example->tags()->sync($request->input('tags', []));

        if ($request->input('upload_docs', false)) {
            $example->addMedia(storage_path('tmp/uploads/' . $request->input('upload_docs')))->toMediaCollection('upload_docs');
        }

        foreach ($request->input('additional_documents', []) as $file) {
            $example->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('additional_documents');
        }

        if ($request->input('profile_picture', false)) {
            $example->addMedia(storage_path('tmp/uploads/' . $request->input('profile_picture')))->toMediaCollection('profile_picture');
        }

        foreach ($request->input('additional_photos', []) as $file) {
            $example->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('additional_photos');
        }

        return redirect()->route('admin.examples.index');
    }

    public function edit(Example $example)
    {
        abort_unless(\Gate::allows('example_edit'), 403);

        $tags = Tag::all()->pluck('name', 'id');

        $hospitals = Hospital::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $example->load('tags', 'hospital');

        return view('admin.examples.edit', compact('tags', 'hospitals', 'example'));
    }

    public function update(UpdateExampleRequest $request, Example $example)
    {
        abort_unless(\Gate::allows('example_edit'), 403);

        $example->update($request->all());
        $example->tags()->sync($request->input('tags', []));

        if ($request->input('upload_docs', false)) {
            if (!$example->upload_docs || $request->input('upload_docs') !== $example->upload_docs->file_name) {
                $example->addMedia(storage_path('tmp/uploads/' . $request->input('upload_docs')))->toMediaCollection('upload_docs');
            }
        } elseif ($example->upload_docs) {
            $example->upload_docs->delete();
        }

        if (count($example->additional_documents) > 0) {
            foreach ($example->additional_documents as $media) {
                if (!in_array($media->file_name, $request->input('additional_documents', []))) {
                    $media->delete();
                }
            }
        }

        $media = $example->additional_documents->pluck('file_name')->toArray();

        foreach ($request->input('additional_documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $example->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('additional_documents');
            }
        }

        if ($request->input('profile_picture', false)) {
            if (!$example->profile_picture || $request->input('profile_picture') !== $example->profile_picture->file_name) {
                $example->addMedia(storage_path('tmp/uploads/' . $request->input('profile_picture')))->toMediaCollection('profile_picture');
            }
        } elseif ($example->profile_picture) {
            $example->profile_picture->delete();
        }

        if (count($example->additional_photos) > 0) {
            foreach ($example->additional_photos as $media) {
                if (!in_array($media->file_name, $request->input('additional_photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $example->additional_photos->pluck('file_name')->toArray();

        foreach ($request->input('additional_photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $example->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('additional_photos');
            }
        }

        return redirect()->route('admin.examples.index');
    }

    public function show(Example $example)
    {
        abort_unless(\Gate::allows('example_show'), 403);

        $example->load('tags', 'hospital');

        return view('admin.examples.show', compact('example'));
    }

    public function destroy(Example $example)
    {
        abort_unless(\Gate::allows('example_delete'), 403);

        $example->delete();

        return back();
    }

    public function massDestroy(MassDestroyExampleRequest $request)
    {
        Example::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
