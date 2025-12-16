<?php

function dirToArray($dir) {
    $contents = array();
    # Foreach node in $dir
    foreach (scandir($dir) as $node) {
        # Skip link to current and parent folder
        if ($node == '.')  continue;
        if ($node == '..') continue;
        # Check if it's a node or a folder
        if (is_dir($dir . DIRECTORY_SEPARATOR . $node)) {
            # Add directory recursively, be sure to pass a valid path
            # to the function, not just the folder's name
            $contents[$node] = dirToArray($dir . DIRECTORY_SEPARATOR . $node);
        } else {
            # Add node, the keys will be updated automatically
            $contents[] = pathinfo($node, PATHINFO_FILENAME);
            // $contents[] = $node;
        }
    }
    # done
    return $contents;
}

function sortSpecifications(array $data): array
{
    // First recurse into children
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $data[$key] = sortSpecifications($value);
        }
    }

    // Split entries
    $scalars = [];
    $associative = [];
    $indexed = [];

    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (array_is_list($value)) {
                $indexed[$key] = $value;
            } else {
                $associative[$key] = $value;
            }
        } else {
            $scalars[$key] = $value;
        }
    }

    // Sort scalars with spec.md first
    uasort($scalars, function ($a, $b) {
        if ($a === 'spec') return -1;
        if ($b === 'spec') return 1;
        return strcmp($a, $b);
    });

    // Sort associative keys alphabetically
    ksort($associative);

    // Indexed arrays keep original order, but always last

    return $scalars + $associative + $indexed;
}
