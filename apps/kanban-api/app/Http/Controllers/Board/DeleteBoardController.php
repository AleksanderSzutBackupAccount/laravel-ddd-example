<?php

declare(strict_types=1);

namespace Apps\KanbanApi\Http\Controllers\Board;

use App\Kanban\Board\Application\Delete\DeleteBoardByIdCommand;
use App\Shared\Domain\Bus\Command\CommandBusInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class DeleteBoardController
{
    public function __construct(private CommandBusInterface $commandBus)
    {
    }

    public function __invoke(Request $request, string $id): JsonResponse
    {
        $this->commandBus->dispatch(
            new DeleteBoardByIdCommand($id)
        );

        return new JsonResponse(
            null,
            Response::HTTP_NO_CONTENT,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}
