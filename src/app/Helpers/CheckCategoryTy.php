<?php
use App\Models\CategoryType;
    if (!function_exists('checkCategoryTy')) {
        function checkCategoryTy($id_category_type)
        {
            $OBJ_Category_Types = CategoryType::all();
            $options = "";
            foreach($OBJ_Category_Types as $OBJ_Category_Type){
                $selected = ($id_category_type == $OBJ_Category_Type->id) ? 'selected' : '';
                $options .= "<option value='".$OBJ_Category_Type->id."'". $selected.">".$OBJ_Category_Type->name."</option>";
            }
            return $options;
        }
    }