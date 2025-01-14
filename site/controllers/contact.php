<?php
use Kirby\Cms\App;

return function (App $kirby, $page) {
    if ($kirby->request()->is('POST')) {
        $data = [
            'name' => get('name'),
            'email' => get('email'),
            'comments' => get('comments'),
        ];

        $validations = [
            'name' => ['required', 'minLength' => 3],
            'email' => ['required', 'email'],
            'comments' => ['minLength' => 5],
        ];

        $messages = [
            'name' => 'Introduce a valid name (minimum 3 characters)',
            'email' => 'Introduce a valid email',
            'comments' => 'Introduce a valid comment (minimum 5 characters)',
        ];

        if ($errors = invalid($data, $validations, $messages)) {
            return [
                'errors' => $errors,
                'data' => $data, // Se devuelven los datos que el usuario introduce
            ];
        }

        try {
            $kirby->email([
                'from' => get('email'),
                'to' => 'andrea@gmail.com',
                'subject' => 'New contact message from: ' . get('name'),
                'body' => "Nombre: " . get('name') . "\nCorreo: " . get('email') . "\nComentarios: " . get('comments'),
            ]);
        } catch (Exception $error) {
            echo $error;
        }

        return [
            'success' => true,
            'message' => 'Your message has been send successfully',
        ];
    }
};