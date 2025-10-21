<?php

use Livewire\Volt\Component;

new class extends Component {
    public $currentRoute = '';
    
    public function mount()
    {
        $this->currentRoute = request()->route()->getName() ?? '';
    }
    
    public function navigateTo($route)
    {
        $this->currentRoute = $route;
        return $this->redirect(route($route), navigate: true);
    }
    
    public function isActive($route)
    {
        return $this->currentRoute === $route;
    }
}; ?>

<div>
    @php
    $menuItems = [
        [
            'route' => 'dashboard',
            'label' => 'Dashboard',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6a2 2 0 01-2 2H10a2 2 0 01-2-2V5z"></path></svg>'
        ],
        [
            'route' => 'profile',
            'label' => 'Profile',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>'
        ],
        [
            'route' => 'settings',
            'label' => 'Settings',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>'
        ],
        [
            'route' => 'users',
            'label' => 'Users',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path></svg>'
        ]
    ];
    @endphp

    <ul class="space-y-2">
        @foreach($menuItems as $item)
            <li>
                <button 
                    wire:click="navigateTo('{{ $item['route'] }}')"
                    class="w-full flex items-center space-x-3 px-3 py-2 text-left rounded-lg transition-all duration-200 group
                        {{ $this->isActive($item['route']) 
                            ? 'bg-primary-100 dark:bg-primary-900/50 text-primary-900 dark:text-primary-100 shadow-sm' 
                            : 'text-gray-600 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-200'
                        }}"
                >
                    <span class="flex-shrink-0 {{ $this->isActive($item['route']) ? 'text-primary-600 dark:text-primary-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-primary-500' }}">
                        {!! $item['icon'] !!}
                    </span>
                    <span class="font-medium">{{ $item['label'] }}</span>
                </button>
            </li>
        @endforeach
    </ul>

    <!-- Additional Menu Section -->
    <div class="mt-8 pt-6 border-t border-primary-200 dark:border-gray-600">
        <h3 class="px-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
            Additional
        </h3>
        <ul class="space-y-1">
            <li>
                <button 
                    wire:click="navigateTo('help')"
                    class="w-full flex items-center space-x-3 px-3 py-2 text-left rounded-lg transition-all duration-200 group
                        {{ $this->isActive('help') 
                            ? 'bg-primary-100 dark:bg-primary-900/50 text-primary-900 dark:text-primary-100' 
                            : 'text-gray-600 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-200'
                        }}"
                >
                    <span class="flex-shrink-0 {{ $this->isActive('help') ? 'text-primary-600 dark:text-primary-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-primary-500' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <span class="font-medium">Help & Support</span>
                </button>
            </li>
        </ul>
    </div>
</div>