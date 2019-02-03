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
    '/finance/pivot' => [
        'controller' => 'Calendar@pivotAction'
    ],
    
    '/finance/calendar' => [
        'controller' => 'Calendar@indexAction'
    ],

    '/finance/calendar/explore/(:var)' => [
        'controller' => 'Calendar@exploreAction'
    ],

    '/finance/calendar/save' => [
        'controller' => 'Calendar@saveAction'
    ],

    '/finance/calendar/edit/(:var)' => [
        'controller' => 'Calendar@editAction'
    ],

    '/finance/calendar/delete/(:var)' => [
        'controller' => 'Calendar@deleteAction'
    ],

    // Income
    '/finance/income' => [
        'controller' => 'Income@indexAction'
    ],

    '/finance/income/save' => [
        'controller' => 'Income@saveAction'
    ],

    '/finance/income/edit/(:var)' => [
        'controller' => 'Income@editAction'
    ],

    '/finance/income/delete/(:var)' => [
        'controller' => 'Income@deleteAction'
    ]
];
