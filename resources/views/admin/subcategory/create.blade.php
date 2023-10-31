<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New SubCategory Blog') }}
        </h2>
    </x-slot>

   

    <form method="post" action="{{ route('subcategory.store') }}">
        @csrf


        <div class="form-group">
            <label for="exampleInputEmail1"> Choice Blog Category </label>
            <select class="from-control" name="category_id"> 
                @foreach($categories as $row)
                <option value="{{ $row->id }}" > {{ $row->category_name }}  </option>
                @endforeach
              
         
            </select>


        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">SubCategory Blog Name</label>
            <input type="text" class="form-control @error('subcategory_name') Is Invalid @enderror"  name="subcategory_name" aria-describedby="emailHelp" 
            placeholder="Category Name" value= "{{ old('subcategory_name')}}" >
            @error('subcategory_name')
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
