<?php

namespace BlimeyDev\LaravelSpecify\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SpecifyPagesController
{
    public function index(){
        $specifications = collect(File::directories(config('specify.markdown-path')))
            ->map(function ($dir) {
                return [
                    'label' => basename($dir),
                    'feature' => basename($dir)
                ];
            });
        // TODO - This needs fixing
        return view('specify::index', [
            'specifications' => $specifications,
        ]);
    }

    public function show(string $feature, ?string $path = null)
    {
        // Default doc if none provided
        $path = $path ?? 'spec';
        // Convert URL path → file path
        $path = config('specify.markdown-path') . "/{$feature}/{$path}.md";
        if (! file_exists($path)) {
            abort(404);
        }

        $markdown = Str::markdown(File::get($path));
        
        // Render markdown, pass to view, etc.
        return view('specify::show', [
            'markdown' => $markdown,
        ]);
    }
}