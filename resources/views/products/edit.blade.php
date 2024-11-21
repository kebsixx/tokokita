<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex mt-6">
            <h2 class="font-semibold text-xl">Edit Products</h2>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->image }}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('products.update', $product) }}" class="flex gap-8">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md">
                </div>
                <div class="w-1/2">
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input accept="image/*" id="image" class="block mt-1 w-full border p-2"
                            type="file" name="image" :value="$product->image" required
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="$product->name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                            :value="$product->price" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area id="description" class="block mt-1 w-full" type="text" name="description"
                            :value="$product->decription" required >{{ $product->description }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
