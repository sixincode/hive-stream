<div>
  <x-hive-display-card
  component='forms.sectionPanel'
  title='{{__("Plans")}}'
>
<x-slot name="description">
  <div class="text-sm">{{__('Your current plan is')}} {{auth()->user()->mainPlanName()}}  {{__(' and will renew on')}} <strong class="font-medium">{{auth()->user()->mainPlanEndDate()}}</strong>.</div>
</x-slot>
  <!-- User Plans -->
  <section>


      <!-- Pricing -->
      <div x-data="{ annual: true }">
          <!-- Toggle switch -->
          <div class="flex items-center space-x-3">
              <div class="text-sm text-slate-500 font-medium">Monthly</div>
              <x-hive-form-toggle
               name="duration"
               value="false"
               identification="duration"
               model="annual"
               />
              <!-- <div class="form-switch">
                  <input type="checkbox" id="toggle" class="sr-only" x-model="annual">
                  <label class="bg-slate-400" for="toggle">
                      <span class="bg-white shadow-sm" aria-hidden="true"></span>
                      <span class="sr-only">Pay annually</span>
                  </label>
              </div> -->
              <div class="text-sm text-slate-500 font-medium">Annually  </div>
          </div>
          <!-- Pricing tabs -->
          <div class="grid grid-cols-12 gap-6 mt-2">
            @foreach($subscriptionPlans as $key=> $plan)
              <!-- Tab {{$key}} -->
              <div class="relative col-span-full xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
                  <div class="absolute top-0 left-0 right-0 h-0.5 bg-emerald-500" aria-hidden="true"></div>
                  <div class="px-5 pt-5 pb-6 border-b border-slate-200">
                      <header class="flex items-center mb-2">
                          <div class="w-6 h-6 rounded-full shrink-0 bg-gradient-to-tr from-emerald-500 to-emerald-300 mr-3">
                              <svg class="w-6 h-6 fill-current text-white" viewBox="0 0 24 24">
                                  <path d="M12 17a.833.833 0 01-.833-.833 3.333 3.333 0 00-3.334-3.334.833.833 0 110-1.666 3.333 3.333 0 003.334-3.334.833.833 0 111.666 0 3.333 3.333 0 003.334 3.334.833.833 0 110 1.666 3.333 3.333 0 00-3.334 3.334c0 .46-.373.833-.833.833z"></path>
                              </svg>
                          </div>
                          <h3 class="text-lg text-slate-800 font-semibold">{{$plan->name}}</h3>
                      </header>
                      <div class="text-sm mb-2">{{$plan->description}}</div>
                      <!-- Price -->
                      <div class="text-slate-800 font-bold mb-4">
                          <span class="text-2xl">$</span><span class="text-3xl" x-text="annual ? '{{intval($plan->annual_price)}}' : '{{intval($plan->price)}}'"></span>
                          <span class="text-slate-500 font-medium text-sm">/
                            <span x-text="annual ? '{{__('yr')}}' : '{{__('mo')}}'"></span>
                          </span>
                      </div>
                      <!-- CTA -->
                      @if($plan->level < auth()->user()->mainPlanLevel())
                      <a href="{{route('user.subscriptions.downgrade', $plan->slug)}}"
                        class="border border-slate-200 hover:border-slate-300 text-slate-600 text-sm justify-center items-center inline-flex rounded w-full p-2 px-4 hover:bg-slate-50 w-full"
                        >
                        Downgrade
                      </a>
                      @elseif($plan->level == auth()->user()->mainPlanLevel())
                      <button
                      class="border border-slate-200 bg-slate-100 text-slate-400 w-full text-sm cursor-not-allowed justify-center p-2 px-4 items-center inline-flex rounded"
                      disabled="">
                          <svg class="w-3 h-3 shrink-0 fill-current mr-2" viewBox="0 0 12 12">
                              <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"></path>
                          </svg>
                          <span>Current Plan</span>
                      </button>
                      @elseif($plan->level > auth()->user()->mainPlanLevel())
                      <a href="{{route('user.subscriptions.upgrade', $plan->slug)}}"
                        class="border border-transparent text-sm justify-center items-center inline-flex rounded w-full p-2 px-4 bg-blue-600 hover:bg-blue-700 text-white w-full"
                        >
                        Upgrade
                      </a>
                      @endif
                  </div>
                  <div class="px-5 pt-4 pb-5">
                      <div class="text-xs text-slate-800 font-semibold uppercase mb-4">What's included </div>
                      <!-- List -->
                      <ul>
                          @foreach($plan->planFeatures as $key => $service)
                            <li class="flex items-center py-1">
                                <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"></path>
                                </svg>
                                <div class="text-sm">{{$service->name}}</div>
                            </li>
                          @endforeach
                      </ul>
                  </div>
              </div>

            @endforeach


          </div>
      </div>
  </section>

</x-hive-display-card>
</div>
