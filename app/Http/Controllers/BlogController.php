<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogCreateRequest;

class BlogController extends Controller
{
  use ImageTrait;
  function index(){
    $page_title = "Add BLog";
  return view("add_blog")->with('title', $page_title);
  }
  function blog_list_index(){
    $page_title = "List BLog";
return view("list_blog")->with('title', $page_title);
  }


  function show(){
    $blogs = Blog::all();

    foreach ($blogs as &$blog) {
        $blog['action'] = '<div class="btn-group" role="group" aria-label="table Button">';
        $blog['action'] .= '<a href="employee?e_id=' . $blog['id'] . '" type="button" class="btn btn-sm btn-info btn-table" ><i class="fa fa-edit me-1"></i>Edit</a>';
        $blog['action'] .= '<button type="button" class="btn btn-sm btn-danger btn-table" title="Delete Blog" onclick="delete_row(' . $blog['id'] . ')"><i class="fa fa-trash me-1"></i>Delete</button>';
        $blog['action'] .= '</div>';
    }

    return response()->json(['data' => $blogs]);
   }

   public function deleteRow($id)
   {
       // Retrieve the blog entry by ID
       $blog = Blog::find($id);

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

function store(BlogCreateRequest $request){
  $data = $request->validated();
  $data["user_id"] = request()->user()->id;
  
  $image_url = $this->uploadOne($request->file("blog_thumbnail"), "media/blogImages");

  $data['blog_category'] = implode(',', $data['blog_category']);
  $data['blog_thumbnail'] = $image_url;

  Blog::create($data);

  return redirect()->route('blog-list')->with('success', 'Blog created successfully.');
}

public function generatePrettyURL(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'blog_title' => 'required|string',
            
        ]);

        // Get the title from the request
        $title = $request->input('blog_title');

        // Generate the pretty URL
        $prettyURL = $this->generatePrettyURLFromString($title);

        // Check if the pretty URL already exists in the database
        $existingBlog = Blog::where('url', $prettyURL)->exists();

        if ($existingBlog) {
            // If the URL already exists, append a unique identifier
            $prettyURL .= uniqid();
        }

        return response()->json(['pretty_url' => $prettyURL]);
    }

    // Function to generate a pretty URL from a string
    private function generatePrettyURLFromString($string)
    {
        // Convert string to lowercase
        $string = strtolower($string);
        
        // Replace spaces with hyphens
        $string = str_replace(' ', '-', $string);
        
        // Remove special characters
        $string = preg_replace('/[^a-z0-9\-]/', '', $string);
        
        // Remove consecutive hyphens
        $string = preg_replace('/-+/', '-', $string);
        
        // Trim leading and trailing hyphens
        $string = trim($string, '-');
        
        return $string;
    }
}
