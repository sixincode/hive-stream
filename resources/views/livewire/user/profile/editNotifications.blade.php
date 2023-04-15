<div>
  <x-hive-display-card
  component='forms.sectionPanel'
  title='{{__("Notifications")}}'
>
<div>
  <x-hive-display-card
  component='forms.subSectionValidatePanel'
  submit=''
  title='{{__("General")}}'
   >
  <!-- User Notifications -->
  <section>
     <ul class="divide-y divide-slate-200">
        <li class="py-3">
            <x-hive-display-card
            name='notification_comments'
            value='{{ auth()->user()->getSettingsNotificationsGeneralComments() }}'
            component='forms.descriptiveToggle'
            title='{{__("Comments and replies")}}'
            description='{{__("Receive notifications when your publications get replies.")}}'
            hook='notificationsGeneral.comments'
             >
           </x-hive-display-card>
        </li>
        <li class="py-3">
            <x-hive-display-card
            name='notification_mentions'
            value='{{ auth()->user()->getSettingsNotificationsGeneralMentions() }}'
            component='forms.descriptiveToggle'
            title='{{__("Mentions")}}'
            description='{{__("Receive notifications when you are mentioned in publications.")}}'
            hook='notificationsGeneral.mentions'
             >
           </x-hive-display-card>
        </li>
        <li class="py-3">
            <x-hive-display-card
            name='notification_following'
            value='{{ auth()->user()->getSettingsNotificationsGeneralFollowings() }}'
            component='forms.descriptiveToggle'
            title='{{__("Following")}}'
            description='{{__("Receive notifications when somebody follows you.")}}'
            hook='notificationsGeneral.followings'
             >
           </x-hive-display-card>
        </li>
     </ul>
</section>
<x-slot name='actions'>
  <x-hive-display-card
  component='forms.footerActionsPrimary'
  cancelText='{{__("Cancel")}}'
  submitText='{{__("Validate")}}'
  submitAction='saveGeneralNotifications'
   />
</x-slot>
</x-hive-display-card>

</div>
</x-hive-display-card>
</div>
