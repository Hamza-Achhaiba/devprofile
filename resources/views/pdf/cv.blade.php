<!DOCTYPE html>
<html>
<head>
    <title>CV of {{ $user->name }}</title>
    <style>/* PDF styles */</style>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->bio }}</p>
    <h2>Projects</h2>
    <ul>
        @foreach($user->projects as $project)
            <li>
                <strong>{{ $project->title }}</strong> - {{ $project->description }}
                @if($project->link)
                    (<a href="{{ $project->link }}" target="_blank">Link</a>)
                @endif
            </li>
        @endforeach
    </ul>
    <h2>Skills</h2>
    <ul>
        @foreach($user->skills as $skill)
            <li>{{ $skill->name }}</li>
        @endforeach
    </ul>
</body>
</html>
