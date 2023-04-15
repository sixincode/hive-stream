<div>
  <x-hive-display-section component='boxedSection' class="py-8 px-2 lg:px-4 xl:px-6">
<div class="bg-white rounded-lg shadow">
  <div x-data="{ activeTab: 'profile' }">

  <div class="flex flex-col md:flex-row md:-mr-px">
      <!-- Sidebar -->
      <div class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-3 py-6 border-b md:border-b-0 md:border-r border-slate-200 min-w-60 md:space-y-3">
          <!-- Group 1 -->
          <div>
              <div class="text-xs font-semibold text-slate-400 uppercase mb-3">My account</div>
              <ul class="flex flex-nowrap md:block mr-3 md:mr-0">

                <x-hive-display-link
                component='licre'
                title='{{_("Profile")}}'
                icon='profile'
                url='profile'/>

                <x-hive-display-link
                component='licre'
                title='{{_("Security")}}'
                icon='security'
                url='security'/>

                <x-hive-display-link
                component='licre'
                title='{{_("Notifications")}}'
                icon='notification'
                url='notifications'/>

                <x-hive-display-link
                component='licre'
                title='{{_("Subscriptions")}}'
                icon='plan'
                url='subscriptions'/>

                <x-hive-display-link
                component='licre'
                title='{{_("Billing")}}'
                icon='wallet'
                url='billing'/>


              </ul>
          </div>
          <!-- Group 2 -->
          <div>
              <div class="text-xs font-semibold text-slate-400 uppercase mb-3">Privacy</div>
              <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                <x-hive-display-link
                component='licre'
                title='{{_("Give Feedback")}}'
                icon='feedback'
                url='feedback'/>
              </ul>
          </div>
      </div>

  <!-- Panel -->
  <div class="grow p-6">
   <!-- Panel body -->
     <div x-cloak
           x-show="activeTab === 'profile' ">
           <livewire:hive-stream-profile-edit-bio/>
       </div>

      <div x-cloak
           x-show="activeTab === 'security' ">
           <livewire:hive-stream-profile-edit-security/>
      </div>

      <div x-cloak
           x-show="activeTab === 'notifications' ">
           <livewire:hive-stream-profile-edit-notifications/>
      </div>

      <div x-cloak
           x-show="activeTab === 'subscriptions' ">
           <livewire:hive-stream-profile-edit-subscriptions/>
      </div>

      <div x-cloak
           x-show="activeTab === 'billing' ">
           <livewire:hive-stream-profile-edit-billing/>
      </div>


        </div>
      </div>
  </div>
</div>
</x-hive-display-section>
</div>
