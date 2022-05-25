<?php

/**
 * Take the newest and opened items
 *
 * @param mysqli $connect DB with an items table
 *
 * @return array of new and opened items
 */
function newItems(mysqli $connect)
{
    $takeNewItems = "SELECT i.name, first_price, image, DATE_FORMAT(expiry_date, '%d.%m.%Y') "
                    . "as expiry_date, price, c.name FROM items i "
                    . "JOIN bets b ON b.item_id = i.id "
                    . "JOIN categories c ON i.category_id = c.id "
                    . "WHERE expiry_date > CURRENT_TIMESTAMP "
                    . "ORDER BY expiry_date DESC";
    $newItems = mysqli_query($connect, $takeNewItems);
    return isExistResult($newItems);;
}
