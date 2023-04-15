<div>
  <x-hive-display-card
  component='forms.sectionPanel'
  title='{{__("Profile")}}'
>
<div>

  <x-hive-display-card
  component='forms.subSectionValidatePanel'
  submit=''
  title='{{__("About")}}'
   >
    <!-- User Picture -->
      <section>
          <div class="flex items-center">
              <div class="mr-4">
                <div class="w-20 h-20 bg-slate-100 rounded-full">
                 </div>
               </div>
               <x-hive-form-button
                     id="change_picture"
                     name="change_picture"
                     tag='button'
                     color='white'
                     title="{{__('Change')}}"
                     type="button"
                     wire:model.defer="change_picture"
                     />
           </div>
      </section>

    <!-- User Profile -->
    <section>
         <div class="grid  sm:grid-cols-2 sm:items-center gap-4 mt-4">
            <div>
                <x-hive-form-input
                  name="first_name"
                  placeholder="{{__('First Name')}}"
                  required="true"
                  label="{{__('First Name')}}"
                  value="{{ old('first_name', '') }}"
                  id="first_name"
                  error_message="{{__('Please enter your first name')}}" />
            </div>
            <div>
                <x-hive-form-input
                  name="last_name"
                  placeholder="{{__('Last Name')}}"
                  required="true"
                  label="{{__('Last Name')}}"
                  value="{{ old('last_name', '') }}"
                  id="first_name"
                  error_message="{{__('Please enter your last name')}}" />
            </div>
            <div>
                <x-hive-form-input
                  name="username"
                  placeholder="{{__('Username')}}"
                  required="true"
                  label="{{__('Username')}}"
                  value="{{ old('username', '') }}"
                  id="username"
                  error_message="{{__('Please enter your username')}}" />
            </div>

            <div class="sm:col-span-2">
                <x-hive-form-text
                name="content"
                label="{{__('Bio')}}"
                wire:model.lazy="content"
                component="transparent"
                placeholder="{{__('Write a bio')}}"
                class="p-4"
                rows="6"
                required="true"
                value="{{ old('content', '') }}"
                span="xl:col-span-6"/>

              </div>

            </div>
     </section>
    <x-slot name='actions'>
      <x-hive-display-card
      component='forms.footerActionsPrimary'
      cancelText='{{__("Cancel")}}'
      submitText='{{__("Validate")}}'
      identification='bio'
       />
    </x-slot>
  </x-hive-display-card>

</div>
</x-hive-display-card>
</div>
