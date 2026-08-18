{{-- <x-layout>
    <x-slot:heading>Create Job </x-slot:heading>
    <form method="POST" action="/jobs">
    @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create a job</h2>
      <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 px-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input id="title" type="text" name="title" placeholder="Programmer" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>
        

        
      </div>
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="Salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 px-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input id="Salary" type="text" name="Salary" placeholder="50,000" class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
          </div>
        </div>
        

        
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>
</x-layout> --}}
<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs" >
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <h2 class="text-base/7 font-semibold text-gray-900">
                    Job Information
                </h2>

                <p class="mt-1 text-sm/6 text-gray-600">
                    Enter the details for the new job.
                </p>


                    <!-- Job Title -->
                    <x-form-field>
                       <x-form-lable for="title">Title</x-form-lable>
                       <x-form-input name="title" id="title" required></x-form-input>
                        <x-form-error name="title"></x-form-error>
                        


                    </x-form-field>
                    

                    <!-- Salary -->
                    <x-form-field>
  <x-form-lable for="salary">Salary</x-form-lable>

                                                <x-form-input name="salary" id="salary" required></x-form-input>


                        <x-form-error name="salary"></x-form-error>
                    </x-form-field>
                     

                    

                    <!-- Employer -->
                    <div class="sm:col-span-4">
                        <label for="employer_id" class="block text-sm/6 font-medium text-gray-900">
                            Employer
                        </label>

                        <div class="mt-2">
                            <select
                                id="employer_id"
                                name="employer_id"
                                class="block w-full rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                            required>
                                <option value="">Select an employer</option>
 @foreach($employers as $employer)
                <option
                    value="{{ $employer->id }}"
                    {{ old('employer_id') == $employer->id ? 'selected' : '' }}
                >
                    {{ $employer->name }}
                </option>
            @endforeach
                                <x-form-error name="employer"></x-form-error>

                            </select>
                        </div>

                          <x-form-error name="employer_id"></x-form-error>

                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a
                href="/jobs"
                class="text-sm/6 font-semibold text-gray-900"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500"
            >
                Save
            </button>
        </div>
    </form>
</x-layout>