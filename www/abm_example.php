<?php

require_once('./models/users_model.php');

# Traer los dat.os de un usuario
$user1 = new User();
$user1->get('admin@admin.com');
print $user1->name . ' ' . $user1->surname . ' existe<br>';


/* # Crear un nuevo usuario
$new_user_data = array(
    'nombre' => 'Alberto',
    'apellido' => 'Jacinto',
    'email' => 'albert2000@mail.com',
    'clave' => 'jacaranda'
);
$usuario2 = new Usuario();
$usuario2->set($new_user_data);
$usuario2->get($new_user_data['email']);
print $usuario2->nombre . ' ' . $usuario2->apellido . ' ha sido creado<br>';


# Editar los datos de un usuario existente
$edit_user_data = array(
    'nombre' => 'Gabriel',
    'apellido' => 'Lopez',
    'email' => 'marconi@mail.com',
    'clave' => '69274'
);
$usuario3 = new Usuario();
$usuario3->edit($edit_user_data);
$usuario3->get($edit_user_data['email']);
print $usuario3->nombre . ' ' . $usuario3->apellido . ' ha sido editado<br>';


# Eliminar un usuario
$usuario4 = new Usuario();
$usuario4->get('lei@mail.com');
$usuario4->delete('lei@mail.com');
print $usuario4->nombre . ' ' . $usuario4->apellido . ' ha sido eliminado'; */