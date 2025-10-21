@extends('layouts.app')

@section('page-title', 'Settings')

@section('content')
<div class="max-w-4xl space-y-6">
    <!-- Settings Navigation -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex space-x-8 px-6" x-data="{ activeTab: 'general' }">
                <button @click="activeTab = 'general'" 
                        :class="activeTab === 'general' ? 'border-primary-500 text-primary-600 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                    General
                </button>
                <button @click="activeTab = 'notifications'" 
                        :class="activeTab === 'notifications' ? 'border-primary-500 text-primary-600 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                    Notifications
                </button>
                <button @click="activeTab = 'privacy'" 
                        :class="activeTab === 'privacy' ? 'border-primary-500 text-primary-600 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                    Privacy
                </button>
                <button @click="activeTab = 'billing'" 
                        :class="activeTab === 'billing' ? 'border-primary-500 text-primary-600 dark:text-primary-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                    Billing
                </button>
            </nav>
        </div>

        <!-- General Settings -->
        <div x-show="activeTab === 'general'" class="p-6">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">General Settings</h3>
                </div>

                <!-- Language & Region -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Language</label>
                        <select class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option>English (US)</option>
                            <option>Bahasa Indonesia</option>
                            <option>Spanish</option>
                            <option>French</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Timezone</label>
                        <select class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option>UTC+7 (Jakarta)</option>
                            <option>UTC+0 (London)</option>
                            <option>UTC-5 (New York)</option>
                        </select>
                    </div>
                </div>

                <!-- Theme Settings -->
                <div>
                    <h4 class="text-base font-medium text-gray-900 dark:text-white mb-3">Appearance</h4>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="theme" value="light" class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Light mode</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="theme" value="dark" class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Dark mode</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="theme" value="system" checked class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">System preference</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Notifications Settings -->
        <div x-show="activeTab === 'notifications'" class="p-6">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Notification Preferences</h3>
                </div>

                <!-- Email Notifications -->
                <div>
                    <h4 class="text-base font-medium text-gray-900 dark:text-white mb-3">Email Notifications</h4>
                    <div class="space-y-3">
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-gray-300">New messages</span>
                            <input type="checkbox" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-gray-300">System updates</span>
                            <input type="checkbox" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Marketing emails</span>
                            <input type="checkbox" class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        </label>
                    </div>
                </div>

                <!-- Push Notifications -->
                <div>
                    <h4 class="text-base font-medium text-gray-900 dark:text-white mb-3">Push Notifications</h4>
                    <div class="space-y-3">
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Comments on your posts</span>
                            <input type="checkbox" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Friend requests</span>
                            <input type="checkbox" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        </label>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Privacy Settings -->
        <div x-show="activeTab === 'privacy'" class="p-6">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Privacy Settings</h3>
                </div>

                <div class="space-y-4">
                    <label class="flex items-center justify-between">
                        <div>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Profile visibility</span>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Allow others to find your profile</p>
                        </div>
                        <input type="checkbox" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                    </label>
                    
                    <label class="flex items-center justify-between">
                        <div>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Show activity status</span>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Let others see when you're online</p>
                        </div>
                        <input type="checkbox" class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                    </label>
                </div>

                <div class="flex justify-end">
                    <button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Billing Settings -->
        <div x-show="activeTab === 'billing'" class="p-6">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Billing Information</h3>
                </div>

                <!-- Current Plan -->
                <div class="bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-base font-medium text-gray-900 dark:text-white">Free Plan</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Current plan</p>
                        </div>
                        <button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                            Upgrade
                        </button>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection