<?php
$prices = [7,6,4,3,1];

$min_price = PHP_INT_MAX;
$max_profit = 0;

foreach ($prices as $price) {
    if ($price < $min_price) {
        $min_price = $price;
    } else if ($price - $min_price > $max_profit) {
        $max_profit = $price - $min_price;
    }
}

echo $max_profit; // Выведет 5
?>
