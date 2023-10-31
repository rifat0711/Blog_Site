<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Blog') }}
        </h2>
    </x-slot>

    <div class= "container mt-4 ">
    <div class= "row">
    <div class= "col-md-12">


    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('upload_blog.store') }}" method="post" enctype="multipart/from-data" >
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blog Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Blog Title" required>
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
                        <option value="{{ $sub->id }}"> ----{{ $sub->subcategory_name }}</option>
                        @endforeach
                        @endforeach

                   </select>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Blog Post Date</label>
                    <input type="date" class="form-control" name="post_date"  required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description">
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
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input"  value= "1">
                    <label class="form-check-label" for="exampleCheck1">Published Now</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
