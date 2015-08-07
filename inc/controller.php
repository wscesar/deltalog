<?php
    // Load other Includes

    # include 'something.php';

    // Processing the page

    $page = !empty($_GET['page']) ? $_GET['page'] : 'home';

    // Choosing the title and metatags

    $title_ptn = 'Structure Boilerplate';

    switch($page) {

        case 'home':
            $title = 'Home | '.$title_ptn;
            break;

        default:
            $title = $title_ptn;

    }

?>