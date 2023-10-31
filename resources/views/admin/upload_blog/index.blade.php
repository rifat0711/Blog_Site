<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Blog List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <a href= "{{ route('subcategory.create') }}" class ="btn btn-sm btn-primary" style="float:right;"> All Blog </a>

                     

                    <table class="table table-responsive ">
                      <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($upload_blogs as $key=>$row)
                            <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->category->category_name }}</td>
                            <td>{{ $row->subcategory->subcategory_name }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ date('d F y', strtotime($row->post_date)) }}</td>
                            
                            <td>
                                <a href= "{{ route('upload_blog.edit', $row->id) }}" class ="btn btn-sm btn-info">Edit </a>
                                <a href= "{{ route('upload_blog.delete', $row->id) }}" class ="btn btn-sm btn-info">Delete </a>  
                            </td>

                            </tr>
                            @endforeach
                        </tbody> 
                        
                   </table>
                  

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
