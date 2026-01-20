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

        <form id="publish-form" method="POST" class="w-full">
            @csrf
            @method('PATCH') 
            <button type="submit" class="normal-btn w-full">
                Publish
            </button>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
    function openPublishModal(articleId) {
        const modal = document.getElementById('{{ $id }}');
        const form = document.getElementById('publish-form');
        
        form.action = `/pam/admin/publish-article/${articleId}`;
        
        modal.classList.remove('hidden');
    }
</script>