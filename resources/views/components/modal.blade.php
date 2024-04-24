<div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900 opacity-50 z-40"></div>
<div id="myModal" class="hidden fixed z-50 inset-0 overflow-y-auto flex items-center justify-center" data-id="">
    <div class="flex items-center justify-center min-h-screen">
      <div class="relative bg-white rounded-lg p-4">
        <!-- Close button -->
        <button id="closeModal" class="close absolute top-0 right-0 p-2">
          <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        {{$slot}}
            
      </div>
    </div>
</div>

