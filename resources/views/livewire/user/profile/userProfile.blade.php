<div>
  <x-hive-display-section>
    <!-- Picture -->
    <section>
        <div class="flex items-center">
            <div class="mr-4">
              <div class="w-20 h-20 bg-slate-100 rounded-full">

               </div>
             </div>
            <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Change</button>
        </div>
    </section>

  <!-- User Profile -->
  <section>
       <div class="grid sm:grid-cols-2 sm:items-center gap-4 mt-4">
          <div>
              <label class="block text-sm font-medium mb-1" for="first_name">First Nddame</label>
              <x-hive-form-input
                name="first_name"
                component="slatt"
                placeholder="{{__('First Name')}}"
                required="true"
                label="{{__('First Name')}}"
                value="{{ old('first_name', '') }}"
                id="first_name"
                error_message="{{__('Please enter your first name')}}" />

           </div>
          <div>
              <label class="block text-sm font-medium mb-1" for="last_name">Last Name</label>
              <input id="last_name" class="form-input w-full" type="text" value="Kz4tSEqtUmA">
          </div>
          <div>
              <label class="block text-sm font-medium mb-1" for="username">Username</label>
              <input id="username" class="form-input w-full" type="text" value="London, UK">
          </div>
      </div>
  </section>
 </x-hive-display-section>
</div>
