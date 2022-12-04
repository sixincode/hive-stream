<div>
  <x-hive-display-section component='boxedSection' class="py-2">
    <x-hive-display-section component='dividedSection' class='py-2'>
     <x-slot name="mainSec">
       <div class="lg:self-center">
         <h2 class="text-lg font-semibold tracking-tight sm:text-xl text-gray-500 flex space-x-2">
           <span class="block">Hi</span>
           <span class="block text-gray-800">Alex {{auth()->user()->first_name}}</span>
         </h2>
         <p class="text leading-6 text-gray-500">
          Keep track of your activities
        </p>
       </div>

     </x-slot>
     <x-slot name="secondSec">

     </x-slot>
   </x-hive-display-section>
  </x-hive-display-section>
</div>
