<x-layout>
    <x-slot:heading>Medical Staff</x-slot:heading>

    <div class="px-4 py-6">

        @can('viewMedicalPage', $medicalStaff)

            @if($medicalStaff->type === 'doctor')

                <div class="rounded-lg border border-blue-200 bg-blue-50 p-6">
                    <h2 class="text-2xl font-bold text-blue-800">
                        Doctor Dashboard
                    </h2>

                    <p class="mt-2 text-blue-700">
                        Welcome, Doctor {{ auth()->user()->name }}.
                    </p>

                    <div class="mt-6">
                        <h3 class="font-semibold text-gray-900">
                            Doctor Actions
                        </h3>

                        <div class="mt-3 flex gap-3">
                            <a
                                href="#"
                                class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-500"
                            >
                                View Patients
                            </a>

                            <a
                                href="#"
                                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500"
                            >
                                Appointments
                            </a>
                        </div>
                    </div>
                </div>

            @elseif($medicalStaff->type === 'nurse')

                <div class="rounded-lg border border-green-200 bg-green-50 p-6">
                    <h2 class="text-2xl font-bold text-green-800">
                        Nurse Dashboard
                    </h2>

                    <p class="mt-2 text-green-700">
                        Welcome, Nurse {{ auth()->user()->name }}.
                    </p>

                    <div class="mt-6">
                        <h3 class="font-semibold text-gray-900">
                            Nurse Actions
                        </h3>

                        <div class="mt-3 flex gap-3">
                            <a
                                href="#"
                                class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-500"
                            >
                                View Patients
                            </a>

                            <a
                                href="#"
                                class="rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-500"
                            >
                                Patient Care
                            </a>
                        </div>
                    </div>
                </div>

            @endif

        @endcan
        @cannot('viewMedicalPage', $medicalStaff)
    <div class="rounded-lg border border-red-200 bg-red-50 p-6">
        <h2 class="text-xl font-bold text-red-800">
            Access Denied
        </h2>

        <p class="mt-2 text-red-700">
            You are not authorized to access this page.
        </p>
    </div>
@endcannot

    </div>
</x-layout>