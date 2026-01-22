@props(['id' => 'confirmDeletionModal', 'type'])

<div id="{{ $id }}" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 hidden">
  
  <div class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full mx-4 p-12">
    <div class="text-center">
      
      <h1 class="text-4xl mb-6 font-semibold">
        Confirm Deletion
      </h1>

      <p class="text-gray-600 mb-10 leading-relaxed">
        Proceeding will delete all the editorial notes. Ensure you have finished your
        assessment, as this article will be removed.
      </p>
      
        <form action="{{ request()->is('pam/admin*') ? route('admin.dashboard.destroy') : route('editor.dashboard.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        

        <input type="hidden" name="article_id" id="modal_article_id">

        <div class="flex gap-4">

          <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="cancel-btn">
            Cancel
          </button>

          <button type="submit" class="normal-btn w-full">
            Delete
          </button>
        </div>
      </form>
    </div>
  </div>

</div>