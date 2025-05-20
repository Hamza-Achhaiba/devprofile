@csrf
@method('PUT')
<div class="mb-3">
    <h3 class="text-lg font-medium text-gray-900">Edit Project</h3>
    
    <div class="mt-2">
        <label for="title" class="form-label">Project Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description', $project->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2">
        <label for="technologies" class="form-label">Technologies Used</label>
        <input type="text" name="technologies" id="technologies" class="form-control @error('technologies') is-invalid @enderror" value="{{ old('technologies', $project->technologies) }}" placeholder="e.g., PHP, Laravel, MySQL, Vue.js">
        @error('technologies')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2">
        <label for="role" class="form-label">Your Role</label>
        <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $project->role) }}" placeholder="e.g., Full Stack Developer">
        @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mt-2">
        <div class="col-md-6">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}">
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}">
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mt-2">
        <div class="form-check">
            <input type="checkbox" name="is_current" id="is_current" class="form-check-input" value="1" {{ old('is_current', $project->is_current) ? 'checked' : '' }}>
            <label for="is_current" class="form-check-label">Currently Working On</label>
        </div>
    </div>

    <div class="mt-2">
        <label for="achievements" class="form-label">Key Achievements</label>
        <textarea name="achievements" id="achievements" class="form-control @error('achievements') is-invalid @enderror" rows="2" placeholder="List your main achievements in this project">{{ old('achievements', $project->achievements) }}</textarea>
        @error('achievements')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2">
        <label for="link" class="form-label">Project Link (optional)</label>
        <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $project->link) }}" placeholder="https://">
        @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2">
        <label for="image" class="form-label">Project Image (optional)</label>
        @if($project->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-warning">Update Project</button>
        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>