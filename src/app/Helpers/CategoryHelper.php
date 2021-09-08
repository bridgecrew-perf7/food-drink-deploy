<?php
use App\Models\Categories;
use App\Enums\CategoryTypes;

    if (!function_exists('getCategoriesByType')) {
          function getCategoriesByType($type)
        {
            if ($type === CategoryTypes::FOOD)
            {
                return Categories::CategoryType(CategoryTypes::FOOD)->get();
            }
            return Categories::CategoryType(CategoryTypes::DRINK)->get();
        }
    }

