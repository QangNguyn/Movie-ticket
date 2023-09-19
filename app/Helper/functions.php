<?php

function isSelected($id, $options)
{
    if ($options) {
        if (is_array($options) && !empty($options)) {
            foreach ($options as $option) {
                if ($id === $option->id) {
                    echo "selected";
                }
            }
        }
    }
}
