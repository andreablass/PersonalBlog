<?php
use Kirby\Cms\App;

return function (App $kirby, $page) {
    if ($kirby->request()->is('POST')) {
        $data = [
            'name' => get('name'),
            'email' => get('email'),
            'comments' => get('comments'),
            'phone' => get('phone'), // honeypot
        ];

        // Validar honeypot: si tiene contenido, es spam
        if (!empty($data['phone'])) {
            // Puedes simplemente no procesar ni enviar nada
            return [
                'errors' => ['honeypot' => 'Spam detected.'],
                'data' => $data,
            ];
        }

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
                'data' => $data,
            ];
        }

        try {
            $kirby->email([
                'from' => $data['email'],
                'to' => 'andrea@gmail.com',
                'subject' => 'New contact message from: ' . $data['name'],
                'body' => "Nombre: " . $data['name'] . "\nCorreo: " . $data['email'] . "\nComentarios: " . $data['comments'],
            ]);
        } catch (Exception $error) {
            return [
                'errors' => ['email' => 'Failed to send email. Please try again later.'],
                'data' => $data,
            ];
        }

        return [
            'success' => true,
            'message' => 'Your message has been sent successfully',
        ];
    }
};
