<?php

declare(strict_types=1);

namespace Api\Services;

use Api\Actions\CreateNewHotelActions;
use Api\Actions\CreateNewRoomActions;
use Api\Actions\GetAllHotelsActions;
use Api\Actions\GetRoomsBylHotelActions;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class HotelServiceApi
{
    /**
     * @return Collection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getAll(): Collection
    {
        return app(GetAllHotelsActions::class)->get();
    }

    /**
     * @param int $id
     * @return object
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getById(int $id): object
    {
        return app(GetRoomsBylHotelActions::class)->setId(id: $id)->get();
    }

    /**
     * Nesse método como ele é responsável por executar multiplas actions
     * Se torna mais interessante trazer a validação de transação para esta camada
     * Assim contribui para a consistencia total dos dados relacionados
     * e reduz a complexidata para executar rollback em tabelas distintas em caso de falha
     *
     * Outra abordagem seria utilizar a arquitetura de CQRS
     *
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $hotel = app(CreateNewHotelActions::class)->setData($data['hotel'])->create();

            foreach ($data['rooms'] as $room){
                $room['hotelId'] = $hotel->id;
                app(CreateNewRoomActions::class)->setData($room)->create();
            }

            DB::commit();

        }catch (Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
