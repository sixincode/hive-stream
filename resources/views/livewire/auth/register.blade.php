<div>
  <x-hive-display-section class="relative h-screen items-center grid sm:py-4">
          <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2830&amp;q=80&amp;sat=-100" alt="People working on laptops">
      <div class="z-10 sm:max-w-xl w-full bg-white/95 mx-auto sm:shadow rounded-md p-4 lg:p-8 grid gap-8">
        <div class="flex space-x-4">
          <img class="h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600" alt="Your Company">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900">
          {{__('Register')}}
          </h2>

        </div>

      <form action="{{ route('register') }}" method="POST">
          @csrf
       <div class="grid lg:grid-cols-12 gap-4 ">

          <div class="lg:col-span-6">
            <x-hive-form-input
              name="first_name"
              placeholder="{{__('First Name')}}"
              required="true"
              label="{{__('First Name')}}"
              value="{{ old('first_name', '') }}"
              id="first_name"
              error_message="{{__('Please enter your first name')}}" />
            </div>
          <div class="lg:col-span-6">
            <x-hive-form-input
              name="last_name"
              placeholder="{{__('Last Name')}}"
              required="true"
              label="{{__('Last Name')}}"
              value="{{ old('last_name', '') }}"
              id="last_name"
              error_message="{{__('Please enter your last name')}}" />
            </div>
            <div class="lg:col-span-6">
              <x-hive-form-input
                name="username"
                placeholder="{{__('Username')}}"
                required="true"
                label="{{__('Username')}}"
                value="{{ old('username', '') }}"
                id="username"
                error_message="{{__('Please pick your username')}}" />
              </div>
              <div class="lg:col-span-6">

                </div>
              <div class="lg:col-span-6">
                <x-hive-form-input
                  name="email"
                  type="email"
                  placeholder="{{__('Email Address')}}"
                  required="true"
                  label="{{__('Email Address')}}"
                  value="{{ old('email', '') }}"
                  id="email"
                  error_message="{{__('Please enter your e-mail')}}" />
                </div>
                <div class="lg:col-span-6">
                  <x-hive-form-input
                    name="phone"
                    type="phone"
                    placeholder="{{__('Phone #')}}"
                    required="false"
                    label="{{__('Phone #')}}"
                    value="{{ old('phone', '') }}"
                    id="phone"
                    error_message="{{__('Please enter your phone number')}}" />
                  </div>
                <div class="lg:col-span-6">
                  <x-hive-form-input
                    name="password"
                    type="password"
                    placeholder="{{__('Password')}}"
                    required="true"
                    label="{{__('Password')}}"
                    id="password"
                    error_message="{{__('Please enter your password')}}" />
                  </div>
                  <div class="lg:col-span-6">
                    <x-hive-form-input
                      name="password_confirmation"
                      type="password"
                      placeholder="{{__('Password confirmation')}}"
                      required="true"
                      label="{{__('Password confirmation')}}"
                      id="password_confirmation"
                      error_message="{{__('Please confirm your password')}}" />
                    </div>
                  </div>


          <div class="mt-8">
            <div class="flex items-center">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="terms" id="terms">

                <div class="ml-2">
                    I agree to the <a target="_blank" href="http://husxl.test/terms-of-service" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" href="http://husxl.test/privacy-policy" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                </div>
            </div>
          </div>

          <div>
            <div class="grid grid-cols-2 gap-4 mt-8 font-semibold">
              <a href="{{route('login')}}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm  rounded-md text-blue-500 hover:text-blue-600 bg-blue-200 bg-opacity-20 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{ __('Already registered?') }}
              </a>
            <button type="submit" class="font-semibold group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                 </svg>
              </span>
              {{ __('Register') }}
            </button>
          </div>
        </div>


      </form>
      </div>
  </x-hive-display-section>
</div>
