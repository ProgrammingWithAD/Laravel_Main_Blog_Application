<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class BlogCategoryController extends Controller
{
    function index(){
        
        return view("category")->with("title","Blog Category");
    }
    function store(Request $request){

        $request->validate([
            'category' => 'required|unique:category|max:255',
        ]);

        Category::create([
            'category' => $request->category,
        ]);

        return redirect()->route('category')->with('success', 'Category created successfully.');

   }

   function show(){
    $categories = Category::all();
    foreach ($categories as &$cat) {
      
          $cat['action'] = '<div class="btn-group" role="group" aria-label="table Button">';
          $cat['action'] .= '<a href="'.route('category.edit', ['id' => $cat->id])  . '" type="button" class="btn btn-sm btn-info btn-table" ><i class="fa fa-edit me-1"></i>Edit</a>';
          $cat['action'] .= '<button type="button" class="btn btn-sm btn-danger btn-table" title="Delete Blog" onclick="delete_row(' . $cat['id'] . ')"><i class="fa fa-trash me-1"></i>Delete</button>';
          $cat['action'] .= '</div>';
      }

      return response()->json(['data' => $categories]);

   // return response()->json(['data' => $categories]);
   }

   public function deleteRow($id)
   {
       // Retrieve the blog entry by ID
       $blog = Category::find($id);

       // Check if the blog entry exists
       if (!$blog) {
          //  return response()->json(['message' => 'Blog entry not found'], 404);
           return response()->json(['result' => false, 'dhSession' => ['error' => 'Sorry !! Try Again']]);
       }

       // Perform deletion logic
       $blog->delete();
       return response()->json(['result' => true,'dhSession' => ['warning' => 'Deleted Successfully!!']]);
      //  return response()->json(['message' => 'Blog entry deleted successfully']);
   }

   public function editRow($id)
   {
    $page_title = "Edit Category";
    // $blog = Blog::findOrFail($id)->update(); // Fetching the blog entry by ID
    $blog = Category::findOrFail($id);

        
        // Retrieve all tasks for the task list
        $blogs = Category::all();
    return view("category",  compact('blog', 'blogs'))->with('title', $page_title);
   }

   public function update( Request $request ,$id)
   {
    $data = $request->validate([
        'category' => 'required|unique:category|max:255',
    ]);
       // Validate the request data
       
   
       // Get the authenticated user's ID
      
   
       // Upload the new blog thumbnail image, if provided
      
   
       // Convert blog categories array to string
      
   
       // Find the blog entry by its ID and update it with the new data
       $blog = Category::findOrFail($id);
       $blog->update($data);
   
       // Redirect back to the blog listing page with a success message
       return redirect()->route('category')->with('success', 'Blog updated successfully.');
   }


   public function showBlogs(Category $id)
{
    $blogs = $id->blogs()->paginate(10); // Adjust pagination as needed

    return view('search', compact('blogs'));
}


}
