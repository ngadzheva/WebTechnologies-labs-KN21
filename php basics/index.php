<?php
    $age = 22;
    $name = 'John';

    function add() {
        global $age;

        $five = 5;

        echo $age + $five;
    }

    add();

    echo "<br/>";

    function increment() {
        static $a = 0;

        echo $a;

        ++$a;
    }

    increment();
    increment();
    increment();

    $array = [];
    $array[0] = 2;
    $array[1] = 5.5;
    $array[] = "10";
    $array[] = 6;


    echo "<br/>";

    var_dump($array);

    echo "<br/>";

    print_r($array);

    foreach($array as $value) {
        echo "<br/>";

        echo $value;
    }

    array_push($array, 8);
    echo "<br/>";
    print_r($array);

    array_unshift($array, 8);
    echo "<br/>";
    print_r($array);

    array_pop($array);
    echo "<br/>";
    print_r($array);

    array_shift($array);
    echo "<br/>";
    print_r($array);

    array_slice($array, 1, 3);

    array_splice($array, 2, 2);
    echo "<br/>";
    print_r($array);

    sort($array);
    rsort($array);

    $namedArray = ["name" => "Jack", "age" => 22];

    echo "<br/>";
    print_r($namedArray);

    echo $namedArray["name"];
    echo $namedArray["age"];
    $namedArray["fn"] = 88888;

    echo "<br/>";
    print_r($namedArray);

    foreach($namedArray as $key => $value) {
        echo "<br/>";
        echo "$key: $value";
    }

    $twoDimesionalArray = [
        [1, 2, 3],
        [4, 5, 6]
    ];

    $namedArr = [
        "first" => [
            "name" => 'Some name',
            "age" => 22
        ],
        "second" => [
            "name" => 'Some other name',
            "age" => 23
        ]
    ];

    echo "<br/>";

    $letters = ['a', 's', 'd', 'f'];
    echo implode('', $letters);
    $str = 'as:df';
    $arr = explode(':', $str);
    print_r($arr);
?>