@extends('layouts.app')

@section('page-title', 'Users')

@section('header-actions')
<button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center space-x-2">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
    </svg>
    <span>Add User</span>
</button>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Search & Filter -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex-1 max-w-lg">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           placeholder="Search users..." 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
            </div>
            <div class="flex space-x-3">
                <select class="px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option>All Roles</option>
                    <option>Admin</option>
                    <option>User</option>
                    <option>Moderator</option>
                </select>
                <select class="px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Suspended</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Users Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @php
        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin', 'status' => 'Active', 'avatar' => 'JD'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User', 'status' => 'Active', 'avatar' => 'JS'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'role' => 'Moderator', 'status' => 'Inactive', 'avatar' => 'MJ'],
            ['name' => 'Sarah Wilson', 'email' => 'sarah@example.com', 'role' => 'User', 'status' => 'Active', 'avatar' => 'SW'],
            ['name' => 'David Brown', 'email' => 'david@example.com', 'role' => 'User', 'status' => 'Suspended', 'avatar' => 'DB'],
            ['name' => 'Lisa Davis', 'email' => 'lisa@example.com', 'role' => 'Admin', 'status' => 'Active', 'avatar' => 'LD'],
            ['name' => 'Tom Anderson', 'email' => 'tom@example.com', 'role' => 'User', 'status' => 'Active', 'avatar' => 'TA'],
            ['name' => 'Emma Thompson', 'email' => 'emma@example.com', 'role' => 'Moderator', 'status' => 'Active', 'avatar' => 'ET'],
        ];
        @endphp

        @foreach($users as $user)
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-lg transition-shadow duration-200">
            <!-- User Avatar & Info -->
            <div class="text-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full mx-auto mb-3 flex items-center justify-center">
                    <span class="text-white font-bold text-lg">{{ $user['avatar'] }}</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user['name'] }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user['email'] }}</p>
            </div>

            <!-- User Details -->
            <div class="space-y-2 mb-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Role:</span>
                    <span class="text-sm font-medium px-2 py-1 rounded-full
                        {{ $user['role'] === 'Admin' ? 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400' : 
                           ($user['role'] === 'Moderator' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400' : 
                            'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300') }}">
                        {{ $user['role'] }}
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Status:</span>
                    <span class="text-sm font-medium px-2 py-1 rounded-full
                        {{ $user['status'] === 'Active' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400' : 
                           ($user['status'] === 'Suspended' ? 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400' : 
                            'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300') }}">
                        {{ $user['status'] }}
                    </span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex space-x-2">
                <button class="flex-1 bg-primary-600 hover:bg-primary-700 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200">
                    Edit
                </button>
                <button class="flex-1 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-900 dark:text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200">
                    View
                </button>
                <button class="p-2 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                Showing 1-8 of 156 users
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 rounded hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Previous
                </button>
                <button class="px-3 py-1 bg-primary-600 text-white rounded">1</button>
                <button class="px-3 py-1 border border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 rounded hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">2</button>
                <button class="px-3 py-1 border border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 rounded hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">3</button>
                <button class="px-3 py-1 border border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 rounded hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>
@endsection