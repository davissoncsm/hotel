<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <a href="{{route('create.hotel')}}" type="button" data-modal-target="modalCreateHotel" data-modal-toggle="modalCreateHotel" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
                Novo Hotel
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Endereço
                </th>
                <th scope="col" class="px-6 py-3">
                    Cidade
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    CEP
                </th>
                <th scope="col" class="px-6 py-3">
                    Site
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($hotels as  $hotel)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$hotel['address']}}
                    </th>
                    <td class="px-6 py-4">
                        {{$hotel['city']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$hotel['state']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$hotel['zip_code']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$hotel['website']}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            <button type="button" class="text-blue-700 border border-blue-700 hover:bg-yellow-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                                <i class="fa-solid fa-bed"></i>
                            </button>
                            <a href="{{route('edit.hotel', $hotel['id'])}}" type="button" class="text-yellow-700 border border-yellow-700 hover:bg-yellow-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:focus:ring-yellow-800 dark:hover:bg-yellow-500">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                                <livewire:hotel.delete-hotel-component :id="$hotel['id']" />
                        </div>
                    </td>
                </tr>
            @empty
                <p>Nenhum hotel cadastrado</p>
            @endforelse

            </tbody>
        </table>
        {{ $hotels->links() }}
    </div>
</div>
