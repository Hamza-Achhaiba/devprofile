<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Welcome back, <span class="text-blue-600">{{ Auth::user()->name }}</span>!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg shadow-md p-6 mb-8 border border-blue-100">
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-4">
                        <svg class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Hello, {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600 mt-1">
                            {{ Auth::user()->title ?? "Developer" }} | 
                            <span class="text-blue-500">{{ Auth::user()->projects->count() }} projects</span> | 
                            <span class="text-green-500">{{ Auth::user()->skills->count() }} skills</span>
                        </p>
                        <p class="text-gray-500 mt-2 italic">
                            "{{ Auth::user()->bio ?? "Welcome to your DevProfile dashboard!" }}"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <!-- Projects Card -->
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <svg class="h-8 w-8 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <div>
                            <p class="text-gray-500">Your Projects</p>
                            <p class="text-2xl font-bold">{{ Auth::user()->projects->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Skills Card -->
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                    <div class="flex items-center">
                        <svg class="h-8 w-8 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <div>
                            <p class="text-gray-500">Your Skills</p>
                            <p class="text-2xl font-bold">{{ Auth::user()->skills->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Generate CV Card -->
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
                    <div class="flex items-center">
                        <svg class="h-8 w-8 text-purple-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <div>
                            <p class="text-gray-500">Ready to Share?</p>
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('cv.generate') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-purple-600 font-semibold hover:underline flex items-center">
                                        <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Generate CV
                                    </button>
                                </form>
                                @if(session('cv_path'))
                                    <a href="{{ route('cv.download') }}" class="text-purple-600 font-semibold hover:underline flex items-center">
                                        <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download CV
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    @forelse(Auth::user()->projects()->latest()->take(3)->get() as $project)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-medium">{{ $project->title }}</p>
                                <p class="text-sm text-gray-500">Added {{ $project->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 italic">No recent projects added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
