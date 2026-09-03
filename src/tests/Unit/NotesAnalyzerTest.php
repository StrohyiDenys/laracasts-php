<?php
use Http\NotesAnalyzer;

it('returns only notes that have more than 10 characters', function () {
    //Arrange
    $fakeNotes = [
        ['id' => 1, 'user_id' => 1, 'body' => 'Short'], // 5 sym NO
        ['id' => 2, 'user_id' => 1, 'body' => 'This is a long note'], // 10+ syms YES
        ['id' => 3, 'user_id' => 1, 'body' => 'Tiny'], // 4 syms NO
    ];
    $analyzer = new NotesAnalyzer($fakeNotes);
    // act
    $result = $analyzer->getLongNotes(10);

    //assert
    expect($result->count())->toBe(1);
    expect($result->first()['id'])->toBe(2);
});


it('returns array with note id`s correctly', function () {
    //Arrange
    $fakeNotes = [
        ['id' => 1, 'user_id' => 1, 'body' => 'Short'],
        ['id' => 2, 'user_id' => 1, 'body' => 'This is a long note'],
        ['id' => 3, 'user_id' => 1, 'body' => 'Tiny'],
    ];
    $analyzer = new NotesAnalyzer($fakeNotes);
    // act
    $result = $analyzer->getNoteIds();

    //assert
    expect($result)->toBe([1, 2, 3]);
});
