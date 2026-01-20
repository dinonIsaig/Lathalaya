@props(['id' => 'confirmSubmittedModal'])

<div id="{{ $id }}" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 hidden">
  
  <div class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full mx-4 p-12">
    <div class="text-center">

    <div class="flex flex-col items-center text-center">
            <div class="mb-6 text-[#F97316]">
                <svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="12" cy="12" r="9"></circle>
                    <polyline points="12 7 12 12 15 15"></polyline>
                </svg>
            </div>
      
      <h1 class="text-4xl mb-6 font-semibold">
        Article Submitted
      </h1>

      <p class="text-gray-600 mb-8 leading-relaxed">
        Thanks for contributing! Our team will now review your content for formatting and guidelines. You'll get an update in your notifications soon.
      </p>

      <button
        type ="button"
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
        class="normal-btn w-full">
        Done
      </button>
    </div>
    </div>
  </div>

</div>
