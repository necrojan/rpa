<?php

namespace App\Models\Concerns;

trait ItemTraitAttributes
{
    public function markAsCompleted(): void
    {
        $this->completed = true;
        $this->save();
    }

    public function markAsPending(): void
    {
        $this->completed = false;
        $this->save();
    }
}
