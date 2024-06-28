<x-navbar>
    Create Product
</x-navbar>

<x-header>
    Create New Product
</x-header>

<x-main>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
        <div class="mt-2">
          <input id="name" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="col-span-full">
          <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
            <input type="file" name="image" id="image">
          </div>
      <div>
        <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
        <div class="mt-2">
          <textarea id="description" name="description" autocomplete="description" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
      </div>
      <div>
        <label for="base_max_hp" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
        <div class="mt-2">
          <input id="price" name="price" type="number" autocomplete="price" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="base_attack" class="block text-sm font-medium leading-6 text-gray-900">Stock</label>
        <div class="mt-2">
          <input id="stock" name="stock" type="number" autocomplete="stock" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
      </div>
    </form>
  </div>
</div>
</x-main>

<x-footer>

</x-footer>