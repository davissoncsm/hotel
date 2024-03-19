<div>
    <div class="flex justify-center">
        <section class="bg-white dark:bg-gray-900 w-3/6 ">
            <div class="py-8 px-4 mx-auto max-w-2xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cadastrar novo quarto</h2>
                @error('zipcode not found')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    {{ $message }}.
                </div>
                @enderror
                <form wire:submit="save">
                    <input type="hidden" wire:model="hotelId" value="{{$hotelId}}">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="text" wire:model="name"  placeholder="Nome"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('name') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea wire:model="description" rows="8" placeholder="Descrição" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ></textarea>
                            @error('description') <span class="text-red-800">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <br />
                    <button id="btnSubmit" type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
                        Salvar
                    </button>
                </form>
            </div>
        </section>
    </div>
</div>
