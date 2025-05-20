<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column - User Info and Password -->
                <div class="space-y-6">
                    <!-- Profile Information -->
                    <div class="bg-white shadow sm:rounded-lg h-auto">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Profile Information</h3>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Password Update -->
                    <div class="bg-white shadow sm:rounded-lg h-auto">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Update Password</h3>
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Right Column - Grid of Other Sections -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Projects Section -->
                    <div class="bg-white shadow sm:rounded-lg h-full">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Projects</h3>
                            <form method="POST" action="{{ route('projects.store') }}" class="mb-4">
                                @include('profile.partials.add-project-form')
                            </form>
                            <div class="mt-4">
                                <h4 class="text-md font-medium text-gray-700 mb-2">Your Projects</h4>
                                <div class="space-y-3 max-h-[300px] overflow-y-auto">
                                    @foreach($user->projects as $project)
                                        <div class="border rounded p-3 bg-gray-50">
                                            <h5 class="font-bold">{{ $project->title }}</h5>
                                            <p class="text-gray-600">{{ $project->description }}</p>
                                            @if($project->link)
                                                <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:underline">View Project</a>
                                            @endif
                                            <div class="mt-2 flex gap-2">
                                                <a href="{{ route('projects.edit', $project) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ route('projects.destroy', $project) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div class="bg-white shadow sm:rounded-lg h-full">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Skills</h3>
                            <form method="POST" action="{{ route('skills.store') }}" class="mb-4">
                                @include('profile.partials.add-skill-form')
                            </form>
                            <div class="mt-4">
                                <h4 class="text-md font-medium text-gray-700 mb-2">Your Skills</h4>
                                <div class="space-y-2 max-h-[300px] overflow-y-auto">
                                    @foreach($user->skills as $skill)
                                        <div class="flex items-center justify-between bg-gray-800 text-white px-4 py-2 rounded-lg">
                                            <div class="flex-1">
                                                <span class="font-medium">{{ $skill->name }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2 ml-4">
                                                <a href="{{ route('skills.edit', $skill) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ route('skills.destroy', $skill) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm" onclick="return confirm('Are you sure you want to delete this skill?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CV Generation Section -->
                    <div class="bg-white shadow sm:rounded-lg h-full">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">CV Generation</h3>
                            <div class="space-y-4">
                                <p class="text-gray-600">Generate and download your CV based on your profile information.</p>
                                
                                @if(session('error'))
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <span class="block sm:inline">{{ session('error') }}</span>
                                    </div>
                                @endif

                                <div class="flex gap-4">
                                    <form method="POST" action="{{ route('cv.generate') }}">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm flex items-center gap-2">
                                            <i class="fas fa-file-pdf"></i> Generate CV
                                        </button>
                                    </form>
                                    
                                    @if(session('cv_path'))
                                        <a href="{{ route('cv.download') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm flex items-center gap-2">
                                            <i class="fas fa-download"></i> Download CV
                                        </a>
                                    @endif
                                </div>

                                @if(session('success'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <span class="block sm:inline">{{ session('success') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Delete Account Section -->
                    <div class="bg-white shadow sm:rounded-lg h-full">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Delete Account</h3>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
