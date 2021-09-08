<?php
use App\Models\Categories;
    if (!function_exists('checkCategoryProduct')) {
        function checkCategoryProduct($id_category)
        {
            $OBJ_Categorys = Categories::all();
            $options = "";
            foreach($OBJ_Categorys as $OBJ_Category){
                $selected = ($OBJ_Category->id == $id_category) ? 'selected' : '';
                $options.="<option value='".$OBJ_Category->id."'".$selected.">".$OBJ_Category->name."</option>";
            }
            return $options;
        }
    }

