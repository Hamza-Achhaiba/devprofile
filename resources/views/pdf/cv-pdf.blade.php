<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name ?? 'Professional CV' }} - CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 28px;
        }
        .header .title {
            color: #666;
            font-size: 18px;
            margin: 10px 0;
        }
        .contact-info {
            margin: 10px 0;
            color: #666;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .experience-item, .education-item {
            margin-bottom: 20px;
        }
        .experience-item h3, .education-item h3 {
            margin: 0;
            color: #34495e;
            font-size: 16px;
        }
        .date {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }
        .skills-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .skills-list li {
            display: inline-block;
            background: #f0f0f0;
            padding: 5px 15px;
            margin: 3px;
            border-radius: 15px;
            font-size: 14px;
        }
        .description {
            margin-top: 5px;
            color: #666;
        }
        .projects-section {
            margin-top: 30px;
        }
        .project-item {
            margin-bottom: 15px;
        }
        .project-item h3 {
            color: #34495e;
            margin: 0;
            font-size: 16px;
        }
        .project-link {
            color: #3498db;
            text-decoration: none;
        }
        .project-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $user->name ?? 'Your Name' }}</h1>
        @if($user->title)
            <div class="title">{{ $user->title }}</div>
        @endif
        <div class="contact-info">
            @if($user->email)
                <p>📧 {{ $user->email }}</p>
            @endif
            @if($user->phone)
                <p>📱 {{ $user->phone }}</p>
            @endif
            @if($user->location)
                <p>📍 {{ $user->location }}</p>
            @endif
            @if($user->username)
                <p>👤 {{ $user->username }}</p>
            @endif
        </div>
    </div>

    @if($user->bio)
    <div class="section">
        <h2 class="section-title">Professional Summary</h2>
        <p>{{ $user->bio }}</p>
    </div>
    @endif

    @if($user->experiences && $user->experiences->count() > 0)
    <div class="section">
        <h2 class="section-title">Work Experience</h2>
        @foreach($user->experiences as $experience)
            <div class="experience-item">
                <h3>{{ $experience->title }}</h3>
                <p class="date">{{ $experience->company }} | {{ $experience->start_date->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</p>
                @if($experience->description)
                    <p class="description">{{ $experience->description }}</p>
                @endif
            </div>
        @endforeach
    </div>
    @endif

    @if($user->education && $user->education->count() > 0)
    <div class="section">
        <h2 class="section-title">Education</h2>
        @foreach($user->education as $education)
            <div class="education-item">
                <h3>{{ $education->degree }}</h3>
                <p class="date">{{ $education->institution }} | {{ $education->start_date->format('M Y') }} - {{ $education->end_date ? $education->end_date->format('M Y') : 'Present' }}</p>
                @if($education->description)
                    <p class="description">{{ $education->description }}</p>
                @endif
            </div>
        @endforeach
    </div>
    @endif

    @if($user->projects && $user->projects->count() > 0)
    <div class="section projects-section">
        <h2 class="section-title">Projects</h2>
        @foreach($user->projects as $project)
            <div class="project-item">
                <h3>{{ $project->title }}</h3>
                <p class="description">{{ $project->description }}</p>
                @if($project->link)
                    <p><a href="{{ $project->link }}" class="project-link" target="_blank">View Project</a></p>
                @endif
            </div>
        @endforeach
    </div>
    @endif

    @if($user->skills && $user->skills->count() > 0)
    <div class="section">
        <h2 class="section-title">Skills</h2>
        <ul class="skills-list">
            @foreach($user->skills as $skill)
                <li>{{ $skill->name }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>
</html> 