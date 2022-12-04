<div>
  <x-hive-display-section class="relative h-screen items-center grid sm:py-4">
          <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2830&amp;q=80&amp;sat=-100" alt="People working on laptops">
      <div class="z-10 sm:max-w-xl w-full bg-white/95 mx-auto sm:shadow rounded-md p-4 lg:p-8 grid gap-6">
        <div class="flex space-x-4">
                 <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600" alt="Your Company">
                <h2 class="text-3xl font-bold tracking-tight text-gray-800">
                {{__('Login')}}
                </h2>

              </div>
        <div>

  </div>


      <form action="{{ route('register') }}" method="POST">
          @csrf
       <div class="grid lg:grid-cols-12 gap-4 ">
              <div class="lg:col-span-12">
                <x-hive-form-input
                  name="email"
                  placeholder="{{__('Username, email Address or phone')}}"
                  required="true"
                  label="{{__('Email Address')}}"
                  value="{{ old('email', '') }}"
                  id="email"
                  error_message="{{__('Please enter your e-mail')}}" />
                </div>

                <div class="lg:col-span-12">
                  <x-hive-form-input
                    name="password"
                    type="password"
                    placeholder="{{__('Password')}}"
                    required="true"
                    label="{{__('Password')}}"
                    id="password"
                    error_message="{{__('Please enter your password')}}" />
                  </div>

                  </div>


          <div class="mt-8">
            <div class="flex items-center justify-between">
                        <div class="flex items-center">
                          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                          <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>

                        <div class="text-sm">
                          <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Forgot your password?</a>
                        </div>
                      </div>
          </div>

          <div>
            <div class="grid  gap-4 mt-8 font-semibold">

            <button type="submit" class="font-bold group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                 </svg>
              </span>
              {{ __('Sign in') }}
            </button>
          </div>
        </div>


      </form>
      </div>
  </x-hive-display-section>
</div>
