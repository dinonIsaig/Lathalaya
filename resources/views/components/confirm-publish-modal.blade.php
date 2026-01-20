@props(['id' => 'confirmPublishModal', 'type'])

<div id="{{ $id }}"  class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 hidden">
  
  <div class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full mx-4 p-12">
    <div class="text-center">
      
      <h1 class="text-4xl mb-6 font-semibold">
        Confirm Publication
      </h1>

      <p class="text-gray-600 mb-10 leading-relaxed">
        You are about to publish this article. Confirm publication of the reviewed article?
      </p>

      <div class="flex gap-4">
        <button
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
          class="cancel-btn">
          Cancel
        </button>

        <button
          class="normal-btn w-full">
          Publish
        </button>
      </div>

    </div>
  </div>

</div>
