<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <a href="{{route('create.room', $hotelId)}}" type="button" data-modal-target="modalCreateHotel" data-modal-toggle="modalCreateHotel" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-800">
                Novo quarto
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    Descrição
                </th>
                <th scope="col" class="px-6 py-3">
                    Ações
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($rooms as  $room)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$room['name']}}
                    </th>
                    <td class="px-6 py-4">
                        {{$room['description']}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            <a href="{{route('edit.room', $room['id'])}}" type="button" class="text-yellow-700 border border-yellow-700 hover:bg-yellow-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:focus:ring-yellow-800 dark:hover:bg-yellow-500">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <livewire:room.delete-room-component :room="$room" />
                        </div>
                    </td>
                </tr>
            @empty
                <p>Nenhum quarto foi encontrado para esse hotel</p>
            @endforelse

            </tbody>
        </table>
        {{ $rooms->links() }}
    </div>
</div>
