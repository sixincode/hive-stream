<div>
  <x-hive-display-card
  component='forms.sectionPanel'
  title='{{__("Security")}}'
>
<div>

  <x-hive-display-card
  component='forms.subSectionValidatePanel'
  submit='updatePassword'
  title='{{__("Password")}}'
   >
  <!-- User Security -->
  <section>
       <div class="grid sm:grid-cols-2 sm:items-center gap-4 mt-4">
          <div>
              <x-hive-form-input
                    id="current_password"
                    name="current_password"
                    placeholder="{{__('Current Password')}}"
                    required="true"
                    label="{{__('Current Password')}}"
                    type="password"
                    class="form-input w-full"
                    wire:model.defer="state.current_password"
                    autocomplete="current-password"
                    />
            </div>
          <div>
          </div>

          <div>
            <x-hive-form-input
                  id="password"
                  name="password"
                  placeholder="{{__('Password')}}"
                  required="true"
                  label="{{__('Password')}}"
                  type="password"
                  class="form-input w-full"
                  wire:model.defer="state.password"
                  autocomplete="new-password"
                  />
          </div>
          <div>
            <x-hive-form-input
                  id="password_confirmation"
                  name="password_confirmation"
                  placeholder="{{__('Password Confirmation')}}"
                  required="true"
                  label="{{__('Password Confirmation')}}"
                  type="password"
                  class="form-input w-full"
                  wire:model.defer="state.password_confirmation"
                  autocomplete="new-password"
                  />
        </div>
      </div>
  </section>
  <x-slot name='actions'>
    <x-hive-display-card
    component='forms.footerActionsPrimary'
    cancelText='{{__("Cancel")}}'
    submitText='{{__("Update Password")}}'
    title='{{__("Update Password")}}'
     />
  </x-slot>
</x-hive-display-card>

</div>
</x-hive-display-card>
</div>
