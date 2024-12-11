<div class="container mx-auto p-4 mt-[80px]">
  <!-- Success Message -->
  @if ($message = Session::get('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <strong class="font-bold">{{ $message }}</strong>
      {{-- <span class="block sm:inline">Your action was successful.</span> --}}
      <button 
          type="button" 
          class="absolute top-0 bottom-0 right-0 px-4 py-3 focus:outline-none text-green-700 hover:text-green-800"
          onclick="this.parentElement.style.display='none';">
          &times;
      </button>
  </div>
  @endif

  <!-- Error Message -->
  @if ($errors->any())
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="font-bold">Terdapat Kesalahan..</span>
      <button 
          type="button" 
          class="absolute top-0 bottom-0 right-0 px-4 py-3 focus:outline-none text-red-700 hover:text-red-800"
          onclick="this.parentElement.style.display='none';">
          &times;
      </button>
  </div>
  @endif
</div>
