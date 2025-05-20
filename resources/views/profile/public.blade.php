<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user ? $user->name . ' - Professional Profile' : 'Professional Profile' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        @if($user)
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gray-800 text-white p-8">
                    <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                    @if($user->title)
                        <p class="text-xl text-gray-300 mt-2">{{ $user->title }}</p>
                    @endif
                    <div class="mt-4 flex flex-wrap gap-4">
                        @if($user->email)
                            <p class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                {{ $user->email }}
                            </p>
                        @endif
                        @if($user->username)
                            <p class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ $user->username }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Bio Section -->
                @if($user->bio)
                    <div class="p-8 border-b">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">About</h2>
                        <p class="text-gray-600">{{ $user->bio }}</p>
                    </div>
                @endif

                <!-- Experience Section -->
                @if($user->experiences && $user->experiences->count() > 0)
                    <div class="p-8 border-b">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Experience</h2>
                        <div class="space-y-6">
                            @foreach($user->experiences as $experience)
                                <div>
                                    <h3 class="text-xl font-medium text-gray-800">{{ $experience->title }}</h3>
                                    <p class="text-gray-600">{{ $experience->company }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $experience->start_date->format('M Y') }} - 
                                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                    </p>
                                    @if($experience->description)
                                        <p class="mt-2 text-gray-600">{{ $experience->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Education Section -->
                @if($user->education && $user->education->count() > 0)
                    <div class="p-8 border-b">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Education</h2>
                        <div class="space-y-6">
                            @foreach($user->education as $education)
                                <div>
                                    <h3 class="text-xl font-medium text-gray-800">{{ $education->degree }}</h3>
                                    <p class="text-gray-600">{{ $education->institution }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $education->start_date->format('M Y') }} - 
                                        {{ $education->end_date ? $education->end_date->format('M Y') : 'Present' }}
                                    </p>
                                    @if($education->description)
                                        <p class="mt-2 text-gray-600">{{ $education->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Projects Section -->
                @if($user->projects && $user->projects->count() > 0)
                    <div class="p-8 border-b">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Projects</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($user->projects as $project)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-xl font-medium text-gray-800">{{ $project->title }}</h3>
                                    <p class="text-gray-600 mt-2">{{ $project->description }}</p>
                                    @if($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">
                                            View Project
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Skills Section -->
                @if($user->skills && $user->skills->count() > 0)
                    <div class="p-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Skills</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($user->skills as $skill)
                                <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden p-8 text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to DevProfile</h1>
                <p class="text-gray-600 mb-6">Create your professional profile to showcase your skills and experience.</p>
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Login</a>
                    <a href="{{ route('register') }}" class="inline-block bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">Register</a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
