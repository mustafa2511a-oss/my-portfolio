<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans p-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8 border-b border-gray-800 pb-4">
            <h1 class="text-3xl font-bold text-red-500">Admin Panel</h1>
            <div class="flex gap-4 items-center">
                <a href="{{ route('home') }}" target="_blank" class="text-sm bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded">View Site</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-600 text-white p-3 rounded mb-6 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Project Form -->
        <form action="{{ route('admin.projects.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg mb-8 space-y-4 border border-gray-700">
            @csrf
            <h2 class="text-xl font-bold mb-4 text-white">Add New Project</h2>
            <div>
                <label class="block text-sm font-medium mb-1">Project Title</label>
                <input type="text" name="title" required class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" required class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500" rows="3"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Technologies (Comma separated)</label>
                <input type="text" name="technologies" placeholder="Laravel, MySQL, React" required class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">GitHub Link</label>
                    <input type="url" name="github_link" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Demo Link</label>
                    <input type="url" name="demo_link" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500">
                </div>
            </div>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-2 rounded transition">Add Project</button>
        </form>

        <!-- User Messages Received -->
        <h2 class="text-2xl font-bold mb-4 text-red-500">Inbox Messages</h2>
        <div class="space-y-4 mb-12">
            @forelse($messages as $msg)
                <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 flex justify-between items-start">
                    <div>
                        <div class="flex gap-4 items-center mb-2">
                            <h3 class="font-bold text-white text-lg">{{ $msg->name }}</h3>
                            <span class="text-xs text-red-400 bg-red-950 px-2 py-0.5 rounded border border-red-800">{{ $msg->email }}</span>
                            <span class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed">{{ $msg->message }}</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Direct Email Reply Button -->
                        <a href="mailto:{{ $msg->email }}?subject=Reply to your Portfolio Inquiry&body=Hi {{ $msg->name }},%0D%0A%0D%0A" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded text-xs transition font-semibold">
                            Reply
                        </a>

                        <!-- Delete Message Form -->
                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete message?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs transition">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-gray-800 p-4 rounded-lg text-gray-400 text-sm">Abhi tak koi message nahi aaya.</div>
            @endforelse
        </div>

        <!-- Existing Projects List -->
        <h2 class="text-2xl font-bold mb-4">Existing Projects</h2>
        <div class="space-y-4">
            @foreach($projects as $project)
                <div class="bg-gray-800 p-4 rounded-lg flex justify-between items-center border border-gray-700">
                    <div>
                        <h3 class="font-bold text-lg text-white">{{ $project->title }}</h3>
                        <p class="text-gray-400 text-sm">{{ $project->technologies }}</p>
                    </div>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>