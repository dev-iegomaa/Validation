<?php
namespace DevIegomaa\PhpValidation;

class Validation
{
    private $name;
    private $email;
    private $phone;
    private $password;
    private $message;
    const PATTERNS = [
        'name' => '/^[a-z]+$/i',
        'email' => '/^[a-z0-9]+@(?:gmail|yahoo).com$/i',
        'phone' => '/^0[\d]{10}$/',
        'message' => '/^[\w\s\,\n]+$/i'
    ];

    public function setName(string $name): int
    {
        $name = ucwords(trim($name, ' '));
        $name = filter_var($name, FILTER_SANITIZE_STRING, [
            'flags' => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_NULL_ON_FAILURE
        ]);
        if (is_null($name)) {
            return -1;
        }
        if (preg_match(self::PATTERNS['name'], $name)) {
            $this->name = $name;
            return 1;
        }
        return -1;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setPassword(string $password): int
    {
        $password = filter_var($password, FILTER_SANITIZE_STRING, [
            'flags' => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_NULL_ON_FAILURE
        ]);
        if (is_null($password)) {
            return -1;
        }
        $this->password = $password;
        return 1;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setMessage(string $message): int
    {
        $message = filter_var($message, FILTER_SANITIZE_STRING, [
            'flags' => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_NULL_ON_FAILURE
        ]);
        $message = quotemeta($message);
        if (preg_match(self::PATTERNS['message'], $message)) {
            $this->message = $message;
            return 1;
        }
        return -1;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setEmail(string $email): int
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
        if (!is_null($email)) {
            if (preg_match(self::PATTERNS['email'], $email)) {
                $this->email = $email;
                return 1;
            }
        }
        return -1;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setPhone(string $phone): int
    {
        $phone = filter_var($phone, FILTER_SANITIZE_STRING, [
            'flags' => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_NULL_ON_FAILURE
        ]);
        if (!is_null($phone)) {
            if (preg_match(self::PATTERNS['phone'], $phone)) {
                $this->phone = $phone;
                return 1;
            }
        }
        return -1;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

}
