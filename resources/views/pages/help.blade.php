@extends('layouts.app')

@section('page-title', 'Help & Support')

@section('content')
<div class="space-y-6">
    <!-- Help Header -->
    <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">How can we help you?</h2>
        <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Find answers to your questions, browse our documentation, or contact our support team.
        </p>
    </div>

    <!-- Search Help -->
    <div class="max-w-2xl mx-auto">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" 
                   placeholder="Search for help articles, guides, or FAQs..." 
                   class="block w-full pl-12 pr-4 py-4 text-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 shadow-sm">
        </div>
    </div>

    <!-- Quick Help Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $helpCategories = [
            [
                'title' => 'Getting Started',
                'description' => 'Learn the basics of using our platform',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
                'color' => 'primary'
            ],
            [
                'title' => 'Account Settings',
                'description' => 'Manage your profile, security, and preferences',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                'color' => 'blue'
            ],
            [
                'title' => 'Troubleshooting',
                'description' => 'Fix common issues and error messages',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>',
                'color' => 'red'
            ]
        ];
        @endphp

        @foreach($helpCategories as $category)
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-lg transition-shadow duration-200 cursor-pointer">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-{{ $category['color'] }}-100 dark:bg-{{ $category['color'] }}-900/20 rounded-lg flex items-center justify-center text-{{ $category['color'] }}-600 dark:text-{{ $category['color'] }}-400">
                    {!! $category['icon'] !!}
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $category['title'] }}</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $category['description'] }}</p>
            <button class="text-{{ $category['color'] }}-600 dark:text-{{ $category['color'] }}-400 font-medium hover:text-{{ $category['color'] }}-700 dark:hover:text-{{ $category['color'] }}-300 transition-colors duration-200">
                Browse articles →
            </button>
        </div>
        @endforeach
    </div>

    <!-- FAQ Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Frequently Asked Questions</h3>
        <div class="space-y-4">
            @php
            $faqs = [
                [
                    'question' => 'How do I reset my password?',
                    'answer' => 'You can reset your password by clicking the "Forgot Password" link on the login page. Enter your email address and follow the instructions sent to your email.'
                ],
                [
                    'question' => 'How can I change my profile picture?',
                    'answer' => 'Go to your Profile page and click on "Change Photo" button. You can upload a new image from your device or choose from our avatar options.'
                ],
                [
                    'question' => 'Can I export my data?',
                    'answer' => 'Yes, you can export your data by going to Settings > Privacy and clicking on "Export Data". The export will be emailed to your registered email address.'
                ],
                [
                    'question' => 'How do I delete my account?',
                    'answer' => 'Account deletion is permanent and cannot be undone. To delete your account, go to Settings > Privacy and scroll to the bottom to find the "Delete Account" option.'
                ]
            ];
            @endphp

            @foreach($faqs as $index => $faq)
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4" x-data="{ open: false }">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                    <span class="font-medium text-gray-900 dark:text-white">{{ $faq['question'] }}</span>
                    <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-200">
                        <path fill="currentColor" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-3 text-gray-600 dark:text-gray-400">
                    {{ $faq['answer'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Contact Support -->
    <div class="bg-gradient-to-r from-primary-50 to-primary-100 dark:from-primary-900/20 dark:to-primary-800/20 rounded-xl border border-primary-200 dark:border-primary-800 p-6">
        <div class="text-center">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Still need help?</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">Our support team is here to help you with any questions or issues.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span>Start Live Chat</span>
                </button>
                <button class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>Send Email</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection