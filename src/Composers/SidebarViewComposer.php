<?php

namespace BlimeyDev\LaravelSpecify\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class SidebarViewComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // So get the folders
        
        $fileStructure = sortSpecifications(
            dirToArray(config('specify.markdown-path'))
        );
        $tree = [];

        foreach ($fileStructure as $feature => $contents) {
            $tree[] = [
                'label' => $feature,
                'url' => null, 
                'children' => $this->buildTree($contents, $feature),
            ];
        }
        $view->with('sidebarTree', $tree);
    }

    protected function buildTree(
        array $data,
        string $feature,
        ?string $group = null
    ): array {
    $nodes = [];

    foreach ($data as $key => $value) {
        if (is_array($value)) {
            // Group node (non-clickable)
            $nodes[] = [
                'label' => $key,
                'url' => null,
                'children' => $this->buildTree(
                    $value,
                    $feature,
                    $key
                ),
            ];
        } else {
            // Document node
            $nodes[] = [
                'label' => $value,
                'url' => $group
                    ? url(config('specify.route_prefix') . "/{$feature}/{$group}/{$value}")
                    : url(config('specify.route_prefix') ."/{$feature}/{$value}"),
                'children' => [],
            ];
        }
    }

    return $nodes;
}

}