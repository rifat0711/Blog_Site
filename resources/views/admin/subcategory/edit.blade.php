<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update SubCategory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <a href= "{{ route('category.index') }}" class ="btn btn-sm btn-primary" style="float:right;"> All Category </a>
             <br><br>

    <form method="post" action="{{ route('subcategory.update', $data->id) }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Choice Blog Category </label>
            <select class="from-control" name="category_id"> 
                @foreach($categories as $row)
                <option value="{{ $row->id }}" @if($row->id==$data->category_id) selected @endif > {{ $row->category_name }}  </option>
                @endforeach
              
         
            </select>


        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">SubCategory Blog Name</label>
            <input type="text" class="form-control @error('subcategory_name') Is Invalid @enderror"  name="subcategory_name" aria-describedby="emailHelp" 
            placeholder="SubCategory Name" value= "{{ $data->subcategory_name}}" >
            @error('subcategory_name')
            <span class ="Invalid-feedback" role="alart">
                <strong> {{ $message }} </strong>
            @enderror
            <br><br>
           
        </div>


  
    <button type="submit" class="btn btn-primary">Update</button>
</form>

                     

                   
                  

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
