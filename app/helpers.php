<?php

function translate($text)
{
    switch ($text) {
        case 'headline':
            return 'titular';
            break;
        case 'alternate':
            return 'suplente';
            break;
    }
}
