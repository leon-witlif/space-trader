<?php

declare(strict_types=1);

namespace App\Contract;

trait ListBehaviour
{
    protected function insertBefore(Task $task): void
    {
        $tempPrevious = $this->previous;

        $this->previous = $task;
        $task->next = $this;

        if ($tempPrevious) {
            $task->previous = $tempPrevious;
            $tempPrevious->next = $task;
        }
    }

    protected function insertAfter(Task $task): void
    {
        $tempNext = $this->next;

        $this->next = $task;
        $task->previous = $this;

        if ($tempNext) {
            $task->next = $tempNext;
            $tempNext->previous = $task;
        }
    }
}
