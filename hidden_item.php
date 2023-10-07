<?php

$grid = [
    "########",
    "#......#",
    "#...#.##",
    "#X#....#",
    "########",
];

// Player Position
$PlayerPositionX = 1;
$PlayerPositionY = 3;

// Steps
$steps = [
    ["positionX" => 0, "positionY" => -1], // Up
    ["positionX" => 1, "positionY" => 0],  // Right
    ["positionX" => 0, "positionY" => 1],  // Down
];

function FindItemLocation($PlayerPositionX, $PlayerPositionY, $steps, $grid) {
    $itemLocation = [];
    $x = $PlayerPositionX;
    $y = $PlayerPositionY;

    foreach ($steps as $step) {
        $x = $x + $step["positionX"];
        $y = $y + $step["positionY"];
        if ($x >= 0 && $x < strlen($grid[0]) && $y >= 0 && $y < count($grid) && $grid[$y][$x] == ".") {
            $itemLocation[] = [$x, $y];
        }
    }

    return $itemLocation;
}

function showGrid($grid, $itemLocation) {
    foreach ($grid as $y => $row) {
        foreach (str_split($row) as $x => $char) {
            if ([$x, $y] ==  $itemLocation) {
                echo "$";
            } else {
                echo $char;
            }
        }
        echo "<br>";
    }
}

$position = FindItemLocation($PlayerPositionX,$PlayerPositionY,$steps,$grid);
echo "STARTING POSITION<br>";
showGrid($grid,[$PlayerPositionX,$PlayerPositionY]);
echo "<hr>";
echo "ORDER OF MOVEMENT<br>";
echo "1. Up/North<br>";
echo "2. Right/East<br>";
echo "3. Down/South<br>";
echo "<hr>";
echo "LIST OF PROBABLE ITEM LOCATIONS<br>";
foreach ($position as $key => $value) {
    echo ($key+1).". Probable item locations : [ X = ".$value[0]+$PlayerPositionX.", Y = ".$value[1]+$PlayerPositionY." ] <br>";
    showGrid($grid,$value);
}

