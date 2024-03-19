<div>
    <div class="flex justify-center">
        <section class="bg-white dark:bg-gray-900 w-3/6 ">
            <div class="py-8 px-4 mx-auto max-w-2xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cadastrar novo hotel</h2>
                @error('zipcode not found')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    {{ $message }}.
                </div>
                @enderror
                <form wire:submit="update">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP</label>
                            <input type="text" wire:model="zipCode" placeholder="CEP" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            @error('zipCode') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex items-stretch">
                            <button type="button" wire:click="searchZipCode()" class="self-end text-cyan-700 hover:text-white border border-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-cyan-500 dark:text-cyan-500 dark:hover:text-white dark:hover:bg-cyan-500 dark:focus:ring-cyan-800">
                                Pesquisar
                            </button>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                            <input type="text" wire:model="address"  placeholder="Endereço" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('address') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade</label>
                            <input type="text" wire:model="city" placeholder="Cidade" required=""  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            @error('city') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <input type="text" wire:model="state" placeholder="Estado" required=""  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            @error('state') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                            <input type="text" wire:model="website" placeholder="Type product name" required=""  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('website') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <br />
                    <button id="btnSubmit" type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
                        Atualizar
                    </button>
                </form>
            </div>
        </section>
    </div>
</div>
