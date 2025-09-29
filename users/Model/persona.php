<?php

class Persona{
    function __construct(
        protected int $id,
        protected string $name,
        protected string $email,
        protected int $edad
    ){}

    public function __toString(): string {
        return 'PersonaDTO(id: '.$this->id.', name: '.$this->name.', email: '.$this->email.', edad: '.$this->edad.')';
    }
};

