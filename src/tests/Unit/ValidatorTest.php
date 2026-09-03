<?php
use Core\Validator;

it('detects string correctly', function () {

        expect(Validator::string("test"))->toBeTrue()
            ->and(Validator::string("    "))->toBeFalse();
});
it('passes only strings longer that specified length.', function () {

    expect(Validator::string("testTt", 5))->toBeTrue()
        ->and(Validator::string("test", 5))->toBeFalse();
});
it('validate email correctly', function () {

    expect(Validator::email("test@test.com"))->toBeTrue()
        ->and(Validator::email("actually not email"))->toBeFalse();
});
