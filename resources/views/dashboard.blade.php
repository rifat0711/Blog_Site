<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            
        </h2>
    </x-slot>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hey , {{Auth::user()->name }} 


                    
                   
                    <br>
                    <a href = "{{ route('category.index') }}" class= "btn btn-info"  > Blog Category Name </a><br>
                    <a href = "{{ route('subcategory.index') }}" class= "btn btn-info"  >  Sub Blog Category </a><br>
                    <br><br>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class = "nav-icon fas fa-copy"></i>
                            <p> Blog Category Name
                                <i class ="fas fa-angle-left right"></i>
                            </p>
                        </a>
                  <ul clas= "nav nav-treeview" >
                            <li class="nav_item">
                            <a href = "{{ route('category.create') }}" class= "nav-link"  >  
                            <i class = "far fa-circle nav-icon"></i>
                            <p> Add Category Blog</p>
                            </a>
                            </li>
                        <li class="nav_item">
                            <a href = "{{ route('category.index') }}" class= "nav-link"  >  
                                 <i class = "far fa-circle nav-icon"></i>
                                 <p> All Blog List</p>
                            </a>
                        </li>
                     </ul>
                   </li>

                   <br>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class = "nav-icon fas fa-copy"></i>
                            <p> Sub categories
                                <i class ="fas fa-angle-left right"></i>
                            </p>
                        </a>
                  <ul clas= "nav nav-treeview">
                            <li class="nav_item">
                            <a href = "{{ route('subcategory.create') }}" class= "nav-link"  >  
                            <i class = "far fa-circle nav-icon"></i>
                            <p> Add Subcategory</p>
                            </a>
                            </li>
                        <li class="nav_item">
                            <a href = "{{ route('subcategory.index') }}" class= "nav-link"  >  
                                 <i class = "far fa-circle nav-icon"></i>
                                 <p> All Subcategory</p>
                            </a>
                        </li>
                     </ul>
                   </li>

                <br>
                   <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class = "nav-icon fas fa-copy"></i>
                            <p> Upload Blog
                                <i class ="fas fa-angle-left right"></i>
                            </p>
                        </a>
                  <ul clas= "nav nav-treeview">
                            <li class="nav_item">
                            <a href = "{{ route('upload_blog.create') }}" class= "nav-link"  >  
                            <i class = "far fa-circle nav-icon"></i>
                            <p> Create Blog</p>
                            </a>
                            </li>
                        <li class="nav_item">
                            <a href = "{{ route('upload_blog.index') }}" class= "nav-link"  >  
                                 <i class = "far fa-circle nav-icon"></i>
                                 <p> Manage Blog </p>
                            </a>
                        </li>
                     </ul>
                   </li>




                
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
