@extends('layouts.app2')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="container mt-5">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-gray dark:bg-gray-800 shadow sm:rounded-lg text-white">
                            <div class="max-w-xl">
                                <h2 class="font-semibold text-xl leading-tight mb-4">
                                    {{ __('Profile') }}
                                </h2>
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-gray dark:bg-gray-800 shadow sm:rounded-lg text-white">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-gray dark:bg-gray-800 shadow sm:rounded-lg text-white">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
