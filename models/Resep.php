<?php

namespace app\models;

class Resep
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?string $ingredients = null;
    public ?string $step = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->description = $data['description'] ?? '';
        $this->ingredients = $data['ingredients'];
        $this->step = $data['step'];
        $this->imagePath = $data['imagePath'] ?? null;
        $this->imageFile = $data['imageFile'] ?? null;
    }

    public function save()
    {
        $errors = [];
        
        if (!$this->title) {
            $errors[] = 'Resep title is required';
        }

        if (!$this->ingredients) {
            $errors[] = 'Resep ingredients is required';
        }

        if (!$this->step) {
            $errors[] = 'Resep step is required';
        }

        if (!is_dir(__DIR__ . '/../public/images')) {
            mkdir(__DIR__ . '/../public/images');
        }

        if (empty($errors)) {

            if ($this->imageFile && $this->imageFile['tmp_name']) {

                if ($this->imagePath) {
                    unlink(__DIR__ . '/../public/' . $this->imagePath);
                }

                $this->imagePath = 'images/' . randomString(8) . '/' . $this->imageFile['name'];
                mkdir(dirname(__DIR__ . '/../public/' . $this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../public/' . $this->imagePath);
            }
        }

        return $errors;

    }
}