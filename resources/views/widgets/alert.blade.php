@if (session()->has('info'))
<div class="p-4 mb-4 text-sm text-blue-800 border-t-4 border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
    <span class="font-medium">{{ session()->get('info') }}</span>
</div>
@endif

@if (session()->has('error'))
<div class="p-4 mb-4 text-sm text-red-800 border-t-4 border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">{{ session()->get('error') }}</span>
</div>
@endif

@if (session()->has('success'))
<div class="p-4 mb-4 text-sm text-green-800 border-t-4 border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session()->get('success') }}</span>
</div>
@endif

@if (session()->has('warning'))
<div class="p-4 mb-4 text-sm text-yellow-800 border-t-4 border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400" role="alert">
    <span class="font-medium">{{ session()->get('warning') }}</span>
</div>
@endif