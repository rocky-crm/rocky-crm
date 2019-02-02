<?php

return [
    // Spendings
    '/finance/spending' => [
        'controller' => 'Spending@indexAction'
    ],

    '/finance/spending/save' => [
        'controller' => 'Spending@saveAction'
    ],

    '/finance/spending/edit/(:var)' => [
        'controller' => 'Spending@editAction'
    ],

    '/finance/spending/delete/(:var)' => [
        'controller' => 'Spending@deleteAction'
    ],

    // Calendar
    '/finance/calendar' => [
        'controller' => 'Calendar@indexAction'
    ],

    '/finance/calendar/save' => [
        'controller' => 'Calendar@saveAction'
    ],

    '/finance/calendar/edit/(:var)' => [
        'controller' => 'Calendar@editAction'
    ],

    '/finance/calendar/delete/(:var)' => [
        'controller' => 'Calendar@deleteAction'
    ]
];
