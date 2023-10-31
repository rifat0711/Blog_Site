<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <a href= "{{ route('category.index') }}" class ="btn btn-sm btn-primary" style="float:right;"> All Category </a>
             <br><br>

    <form method="post" action="{{ route('category.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Blog Category Name</label>
            <input type="text" class="form-control @error('category_name') Is Invalid @enderror"  name="category_name" aria-describedby="emailHelp" 
            placeholder="Category Name" value= "{{ old('category_name')}}" >
            @error('category_name')
            <span class ="Invalid-feedback" role="alart">
                <strong> {{ $message }} </strong>
            @enderror
            <br><br>
           
        </div>

  
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

                     

                   
                  

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
