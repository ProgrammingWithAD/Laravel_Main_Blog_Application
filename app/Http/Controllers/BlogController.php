<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogCreateRequest;
use App\Models\BlogCategoryMaping;

class BlogController extends Controller
{
  use ImageTrait;
  function index(){
    $page_title = "Add BLog";
  return view("add_blog")->with('title', $page_title);
  }
  function blog_list_index(){
    $page_title = "List BLog";
    $data =Blog::all();
return view("list_blog")->with('title', $page_title);
  }


//   function show(){
// // public function index($id){
//     //     $data=User::with('blog')->find($id);
//     //     return $data;
//     // }

//     $user_id=Auth::user()->id;
//     // $blogs = Blog::all();
//     $blogs = User::with('blog')->find($user_id);

//     foreach ($blogs as &$blog) {
//       $blog['blog_thumbnail'] = '<img src="' . asset($blog['blog_thumbnail']) . '" alt="" width="150px">';
//         $blog['action'] = '<div class="btn-group" role="group" aria-label="table Button">';
//         $blog['action'] .= '<a href="'.route('blog.edit', ['id' => $blog->id])  . '" type="button" class="btn btn-sm btn-info btn-table" ><i class="fa fa-edit me-1"></i>Edit</a>';
//         $blog['action'] .= '<button type="button" class="btn btn-sm btn-danger btn-table" title="Delete Blog" onclick="delete_row(' . $blog['id'] . ')"><i class="fa fa-trash me-1"></i>Delete</button>';
//         $blog['action'] .= '</div>';
//     }

//     return response()->json(['data' => $blogs]);
//    }
public function show() {
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user's ID
        $user_id = Auth::user()->id;

        // Fetch the user's blogs
        $user_blogs = User::with('blogs')->find($user_id);
// dd(json_encode($blogs));
        // Process the fetched blogs
        $blogs=$user_blogs->blogs ;
        foreach ($blogs as $blog) {
            $blog['blog_thumbnail'] = '<img src="' . asset($blog['blog_thumbnail']) . '" alt="" width="150px">';
            $blog['action'] = '<div class="btn-group" role="group" aria-label="table Button">';
            $blog['action'] .= '<a href="'.route('blog.edit', ['id' => $blog["id"]]) . '" type="button" class="btn btn-sm btn-info btn-table"><i class="fa fa-edit me-1"></i>Edit</a>';
            $blog['action'] .= '<button type="button" class="btn btn-sm btn-danger btn-table" title="Delete Blog" onclick="delete_row(' . $blog['id'] . ')"><i class="fa fa-trash me-1"></i>Delete</button>';
            $blog['action'] .= '</div>';
        }
        // Return the blogs as JSON response
        return response()->json(['data' => $user_blogs->blogs]);
    } else {
        // User is not authenticated, handle the case accordingly
        return response()->json(['error' => 'User is not authenticated']);
    }
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
   public function editRow($id)
   {
    $page_title = "Edit BLog";
    // $blog = Blog::findOrFail($id)->update(); // Fetching the blog entry by ID
    $blog = Blog::findOrFail($id);

        
        // Retrieve all tasks for the task list
        $blogs = Blog::all();
    return view("add_blog",  compact('blog', 'blogs'))->with('title', $page_title);
   }

   

  //  public function update($id, $data){
  //     Blog::findOrFail($id)->update($data); // Fetching the blog entry by ID
  //     return redirect()->route('blog-list');
  //  }

function store(BlogCreateRequest $request, $id=null){
  $data = $request->validated();
  $data["user_id"] = request()->user()->id;

  // if(!is_null($id)){
  //   $this->update($id, $data);
  // }
  
  $image_url = $this->uploadOne($request->file("blog_thumbnail"), "media/blogImages");

  $data['blog_category'] = implode(',', $data['blog_category']);
  $data['blog_thumbnail'] = $image_url;

 $blog= Blog::create($data);
 $blog_id = $blog->id;
 $data['blog_category'] =explode(',', $data['blog_category']);
 foreach ($data['blog_category'] as $cat) {
    $maping = new BlogCategoryMaping();
    $maping->blog_id = $blog_id;
    $maping->category_id = $cat;
    $maping->save();
 }





  return redirect()->route('blog-list')->with('success', 'Blog created successfully.');
}



public function update(BlogCreateRequest $request, $id)
{
    // Validate the request data
    $data = $request->validated();

    // Get the authenticated user's ID
    $data["user_id"] = $request->user()->id;

    // Upload the new blog thumbnail image, if provided
    if ($request->hasFile('blog_thumbnail')) {
        $image_url = $this->uploadOne($request->file("blog_thumbnail"), "media/blogImages");
        $data['blog_thumbnail'] = $image_url;
    }

    // Convert blog categories array to string
    $data['blog_category'] = implode(',', $data['blog_category']);

    // Find the blog entry by its ID and update it with the new data
    $blog = Blog::findOrFail($id);
    $blog->update($data);

    // Redirect back to the blog listing page with a success message
    return redirect()->route('blog-list')->with('success', 'Blog updated successfully.');
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
