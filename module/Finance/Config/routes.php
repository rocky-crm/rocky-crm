<?php

return [
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
    ]
];
