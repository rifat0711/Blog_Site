<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <a href= "{{ route('category.index') }}" class ="btn btn-sm btn-primary" style="float:right;"> All Category </a>
             <br><br>

    <form method="post" action="{{ route('category.update', $data->id) }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control"  name="category_name" aria-describedby="emailHelp" 
             value= "{{ $data->category_name }}" required>
           
           
        </div>

  
    <button type="submit" class="btn btn-primary">Update</button>
</form>

                     

                   
                  

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
