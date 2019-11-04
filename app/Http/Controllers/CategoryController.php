<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\CategoryBusiness;

class CategoryController extends Controller
{
    public function save(Request $request, $id)
    {
    	if ($id == -1) {
            $description = $request->input("category-1description");
            $category = CategoryBusiness::create($description);
            $id = $category->id;
        } else {
            $data = [
                'description' => $request->input("product".$id."description")
            ];
            ProductBusiness::update($id, $data);
        }
    	return redirect("admin/profile#categoryTable);
    }

    public function delete($id)
    {
    	if ($id != -1) {
            CategoryBusiness::delete($id);
        }
        return redirect('admin/profile#categoryTable');
    }
}
