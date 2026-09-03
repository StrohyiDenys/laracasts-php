<?php
namespace Http;

use Illuminate\Support\Collection;

class NotesAnalyzer
{
    protected Collection $notes;

    public function __construct(array $notes)
    {
        $this->notes = new Collection($notes);
    }

    public function getLongNotes(int $minLength): Collection
    {
        return $this->notes->filter(fn($item) => strlen($item['body'])>=$minLength);
    }

    public function getNoteIds(): array
    {
        return $this->notes->pluck("id")->toArray();
    }
}