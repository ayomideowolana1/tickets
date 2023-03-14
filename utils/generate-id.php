<?php

function generate_id($type)
{
    switch ($type) {
        case 'transaction':
            return 'tra_' . uniqid();
            break;
    }
}
