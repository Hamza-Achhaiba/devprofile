<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CV - {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 40px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #007bff;
        }
        .header h1 {
            color: #007bff;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        .project {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .project h3 {
            color: #0056b3;
            margin-bottom: 10px;
        }
        .project-link {
            color: #007bff;
            text-decoration: none;
        }
        .project-link:hover {
            text-decoration: underline;
        }
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .skill {
            background: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }}</p>
    </div>

    <div class="section">
        <h2 class="section-title">Projects</h2>
        @foreach($projects as $project)
            <div class="project">
                <h3>{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                @if($project->link)
                    <p><a href="{{ $project->link }}" class="project-link" target="_blank">View Project</a></p>
                @endif
            </div>
        @endforeach
    </div>

    <div class="section">
        <h2 class="section-title">Skills</h2>
        <div class="skills">
            @foreach($skills as $skill)
                <span class="skill">{{ $skill->name }}</span>
            @endforeach
        </div>
    </div>
</body>
</html> 