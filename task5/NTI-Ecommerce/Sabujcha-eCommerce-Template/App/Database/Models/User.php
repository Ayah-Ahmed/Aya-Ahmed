<?php

namespace App\Database\Models;

use App\Database\Config\Connection;
use App\Database\Contract\Crud;

// connect User model with users table in database
class User extends Connection implements Crud
{
    private $id, $first_name, $last_name, $gender, $email, $password,
        $phone, $image, $status, $remeber_token, $verfication_code, $verfied_email_at, $created_at, $updated_at;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    /**
     * Get the value of remeber_token
     */
    public function getRemeber_token()
    {
        return $this->remeber_token;
    }

    /**
     * Set the value of remeber_token
     *
     * @return  self
     */
    public function setRemeber_token($remeber_token)
    {
        $this->remeber_token = $remeber_token;

        return $this;
    }

    /**
     * Get the value of verfication_code
     */
    public function getVerfication_code()
    {
        return $this->verfication_code;
    }

    /**
     * Set the value of verfication_code
     *
     * @return  self
     */
    public function setVerfication_code($verfication_code)
    {
        $this->verfication_code = $verfication_code;

        return $this;
    }

    /**
     * Get the value of verfied_email_at
     */
    public function getVerfied_email_at()
    {
        return $this->verfied_email_at;
    }

    /**
     * Set the value of verfied_email_at
     *
     * @return  self
     */
    public function setVerfied_email_at($verfied_email_at)
    {
        $this->verfied_email_at = $verfied_email_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    public function create()
    {
        # Prepare & bind
        $query = "INSERT INTO  `users` (`first_name`,`last_name`,`gender`,`email`,`password`,`phone`, `verfication_code`)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "ssssssi",
            $this->first_name,
            $this->last_name,
            $this->gender,
            $this->email,
            $this->password,
            $this->phone,
            $this->verfication_code
        );
        return $stmt->execute();
    }
    public function read()
    {
    }
    public function update()
    {
        $query = "UPDATE `users` SET `first_name` = ?, `last_name` = ?, `gender` = ? WHERE `email` = ?";

        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ssss", $this->first_name, $this->last_name, $this->gender, $this->email);
        return $stmt->execute();
    }
    public function delete()
    {
    }
    public function checkCode()
    {
        $query = "SELECT * FROM `users` WHERE `email` = ? AND `verfication_code` = ?";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("si", $this->email, $this->verfication_code);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function makeUserVerified()
    {
        $query = "UPDATE `users` SET `verfied_email_at` = ? WHERE `email` = ?";

        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ss", $this->verfied_email_at, $this->email);
        return $stmt->execute();
    }
    public function getUserByEmail()
    {
        $query = "SELECT * FROM `users` WHERE `email` = ?";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getUserByToken()
    {
        $query = "SELECT * FROM `users` WHERE `remeber_token` = ?";
        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("s", $this->remeber_token);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function safeData()
    {
        return (object)[
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'gender' => $this->gender,
            'image' => $this->image,
            'status' => $this->status,
            'verfication_code' => $this->verfication_code,
            'verfied_email_at' => $this->verfied_email_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    public function updateUserCode()
    {
        $query = "UPDATE `users` SET `verfication_code` = ? WHERE `email` = ?";

        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("is", $this->verfication_code, $this->email);
        return $stmt->execute();
    }
    public function updatePassword()
    {
        $query = "UPDATE `users` SET `password` = ? WHERE `email` = ?";

        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ss", $this->password, $this->email);
        return $stmt->execute();
    }
    public function updateRemeberToken()
    {
        $query = "UPDATE `users` SET `remeber_token` = ? WHERE `email` = ?";

        $stmt = $this->con->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ss", $this->remeber_token, $this->email);
        return $stmt->execute();
    }
}