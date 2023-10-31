<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class= "container mt-4 ">
    <div class= "row">
    <div class= "col-md-12">


    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('upload_blog.update', $upload_blog->id) }}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blog Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $upload_blog->title }}" placeholder="Blog Title" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Blog Category</label>
                   <select class="from-control" name= "subcategory_id">
                        <option disabled selected>
                             Choose Blog Category
                        </option>
                        @foreach($category as $cat)
                        @php
                        $subcategories= DB::table('subcategories')->where('category_id',$cat->id)->get();
                        @endphp
                        <option disabled class= "text-info">{{ $cat->category_name}} </option>
                        @foreach($subcategories as $sub)
                        <option value="{{ $sub->id }}"  @if($sub->id==$upload_blog->subcategory_id) selected @endif > ----{{ $sub->subcategory_name }}</option>
                        @endforeach
                        @endforeach

                   </select>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Blog Post Date</label>
                    <input type="date" class="form-control" name="post_date" value="{{ $upload_blog->post_date }}" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description"  value="{{ $upload_blog->description }}">
                    </textarea>

                  </div>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>
                      <input type="hidden" name="old_image" value="{{$upload_blog->image}}" >
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="1" >
                    <label class="form-check-label" for="exampleCheck1">Published Now</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
