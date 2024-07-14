<?php

namespace Conkard\Enums;

enum CardFieldCategory: string
{
    case PERSONAL = 'PERSONAL';
    case GENERAL = 'GENERAL';
    case SOCIAL = 'SOCIAL';
    case MESSAGING = 'MESSAGING';
    case BUSINESS = 'BUSINESS';
    case OTHERS = 'OTHERS';
}
