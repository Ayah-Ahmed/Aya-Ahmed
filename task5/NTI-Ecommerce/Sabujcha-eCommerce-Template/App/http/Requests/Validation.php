<?php

namespace App\http\Requests;


use App\http\Requests\GetError;
use App\Database\Config\Connection;


class Validation
{
    private array $errors = [];
    private $valueName;
    private $value;
    public function getErrors()
    {
        return $this->errors;
    }


    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    public function setValueName($valueName)
    {
        $this->valueName = $valueName;

        return $this;
    }
    public function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} is required");
        }
        return $this;
    }
    public function confirmed($comparedValue)
    {
        if ($this->value != $comparedValue) {
            $this->errors[$this->valueName . '_confirmation'][__FUNCTION__] = GetError::Message("{$this->valueName} Confirmation is not confirmed With {$this->valueName}");
        }
        return $this;
    }
    public function max($max)
    {
        if (strlen($this->value) > $max) {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be less than {$max} character");
        }
        return $this;
    }
    public function digit($digit)
    {
        if (strlen($this->value) != $digit) {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be less than {$digit} digits");
        }
        return $this;
    }
    public function integer()
    {
        if (!ctype_digit($this->value)) {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be " . __FUNCTION__);
        }
        return $this;
    }
    public function regex($regularExpression, $message = "Invaild")
    {
        if (!preg_match($regularExpression, $this->value)) {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} {$message}");
        }
    }
    public function in($array)
    {
        if (!in_array($this->value, $array)) {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be " . implode(',', $array));
        }
        return $this;
    }
    public function unique(string $table, string $column = "")
    {
        $conn = new Connection;
        if (!$column) {
            $column = $this->valueName;
        }
        $stmt = $conn->con->prepare("SELECT * from `{$table}` WHERE {$column} =?");
        $stmt->bind_param('s', $this->value);
        $stmt->execute();
        if (!is_null($stmt->get_result()->fetch_object()))
        #Another way:   if($stmt->get_result()->num_rows ==1)
        {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} already Exists");
        }

        return $this;
    }
    public function exists(string $table, string $column = "")
    {
        $conn = new Connection;
        if (!$column) {
            $column = $this->valueName;
        }
        $stmt = $conn->con->prepare("SELECT * from `{$table}` WHERE {$column} =?");
        $stmt->bind_param('s', $this->value);
        $stmt->execute();
        if (is_null($stmt->get_result()->fetch_object()))
        #Another way:   if($stmt->get_result()->num_rows != 1)
        {
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} Not Exists");
        }
        return $this;
    }
}