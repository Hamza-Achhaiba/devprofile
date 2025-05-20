@csrf
<div class="mb-4">
    <label for="title" class="block text-gray-700 font-medium mb-2">Project Title</label>
    <input type="text" name="title" id="title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter project title" />
</div>
<div class="mb-4">
    <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
    <textarea name="description" id="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="3" placeholder="Enter project description"></textarea>
</div>
<div class="mb-4">
    <label for="link" class="block text-gray-700 font-medium mb-2">Project Link</label>
    <input type="text" name="link" id="link" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter project URL" />
</div>
<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">
    <i class="fas fa-plus"></i> Add Project
</button>
