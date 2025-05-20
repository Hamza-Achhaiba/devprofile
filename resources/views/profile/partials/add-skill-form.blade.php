@csrf
<div class="mb-3">
    <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Skill</h3>
    <div class="mt-2">
        <label for="name" class="block text-gray-700 font-medium mb-2">Skill Name</label>
        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter skill name" required>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">
            <i class="fas fa-plus"></i> Add Skill
        </button>
    </div>
</div>
