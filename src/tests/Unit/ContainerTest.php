<?php
use Core\Container;
test('Container resolve bind correctly', function () {
    //Arrange
    $conatiner = new Container();
    $conatiner->bind("testKey", fn()=>"test");

    //Act
    $result = $conatiner->resolve("testKey");

    //Assert
    expect($result)->toBe("test"); // tobe is ===, toequal is ==
});
